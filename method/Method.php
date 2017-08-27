<?php namespace bot\method;

use bot\helper\Token;
use bot\base\Request;
use bot\object\Error;
use bot\object\Object;
use yii\helpers\ArrayHelper as AH;
use yii\base\UnknownClassException;
use yii\base\InvalidParamException;

/**
 * Available methods
 * All methods in the Bot API are case-insensitive.
 * We support GET and POST HTTP methods. Use either URL query string
 * or application/json or application/x-www-form-urlencoded or
 * multipart/form-data for passing parameters in Bot API requests.
 * On successful call, a JSON-object containing
 * the result will be returned.
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Method
 * @package bot\method
 * @link https://core.telegram.org/bots/api#available-methods
 */
abstract class Method extends Request
{

    /**
     * The method real name.
     * @return string
     */
    public static function methodName()
    {
        $nameSpace = self::className();
        $className = basename(str_replace('\\', '/', $nameSpace));
        $methodName = lcfirst($className);

        return $methodName;
    }

    /**
     * Telegram's bot token
     * @var string
     */
    private $_token;

    /**
     * Method constructor.
     * @param string $token
     * @param array $params
     */
    public function __construct($token = null, array $params = [])
    {
        $this->_token = $token;
        $this->__set('method', $this->methodName());

        parent::__construct($params);
    }

    
    /**
     * Send this request by this method.
     * 
     * @param string $token the bot token string
     * @param array $params
     * @return array|bool|Error|mixed
     */
    public function sendBy($token, array $params = [])
    {
        $this->_token = $token;
        return $this->send($params);
    }
    
    /**
     * Send this method with all params
     * to Telegram server.
     *
     * @param array $params
     * @return array|bool|Error|mixed
     * @throws UnknownClassException
     * @throws InvalidParamException
     */
    public function send(array $params = [])
    {
        if ($this->_token == null) {
            $className = self::className();
            $message = 'token must be ready, use ' . $className . '::sendBy($token).';
            throw new InvalidParamException('Invalid Param: ' . $message);
        }
        
        \Yii::configure($this, $params);
        $res = parent::sendBy($this->_token);

        // Success
        if ($res['ok'] && isset($res['result'])) {
            if (is_array($res['result'])) {
                $className = $this->response();
                if (class_exists($className)) {
                    return $this->introduceMap($className, $res['result']);
                }
            }

            return $res['result'];
        }

        // Warning
        else if (is_array($res)) {
            $error = new Error($res);
            $code = $error->getErrorCode();
            $description = $error->getDescription();
            $id = (new Token($this->_token))->getId();

            if (YII_DEBUG === true) {
                $info = '[' . $id. '][' . $code . ']';
                \Yii::warning($info . ' ' . $description, self::className());
            }

            return $error;
        }

        // Error
        return false;
    }

    /**
     * Find relations and introduce to owen classes,
     * and return the property's value.
     *
     * @param string $className the relation class's name
     * @param mixed $value the value to set relation
     * @return mixed
     * @throws UnknownClassException
     */
    private function introduceMap($className, $value)
    {
        // is associative
        if (AH::isAssociative($value)) {

            // is Telegram Object
            $class = new $className($value);
            if ($class instanceof Object) {
                return $class;
            }

            throw new UnknownClassException($className . ' not Telegram Object.');
        }

        // is indexed
        else if (AH::isIndexed($value)) {
            $output = [];
            foreach ($value as $_key => $_value) {
                $relation = $this->introduceMap($className, $_value);
                $output[$_key] = $relation;
            }

            return $output;
        }

        // is't array
        return $value;
    }

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    abstract protected function response();
}
