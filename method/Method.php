<?php namespace bot\method;

use bot\helper\Token;
use bot\base\Request;
use bot\object\Error;
use bot\object\Object;
use yii\helpers\ArrayHelper as AH;
use yii\base\UnknownClassException;

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
     * Returns the fully qualified name of this method.
     * @return string
     */
    public static function methodName()
    {
        $nameSpace = self::className();
        $className = end(explode('\\', $nameSpace));
        $methodName = lcfirst($className);
        return $methodName;
    }

    /**
     * Method constructor.
     * @param string $token the bot api server
     * @param array $params properties of object request
     */
    public function __construct($token = null, $params = [])
    {
        $this->__set('method', $this->methodName());
        \Yii::configure($this, $params);
        parent::__construct($token);
    }

    /**
     * Send this request by old token, you can use next token by
     * self::sendBy() method instead of this method.
     *
     * @param array $params properties of object request
     * @return object of response
     */
    public function send(array $params = [])
    {
        $res = parent::send($params);

        // success
        if (
            $res['ok'] !== false &&
            AH::keyExists('result', $res)
        ) {
            $result = $res['result'];
            if (is_array($result)) {
                $className = $this->response();
                if (class_exists($className)) {
                    return $this->joinRelations($className, $result);
                }
            }

            return $result;
        }

        // warning
        if (is_array($res)) {
            $error = new Error($res);
            $code = $error->getErrorCode();
            $description = $error->getDescription();
            $id = (new Token($this->token))->getId();

            if (YII_DEBUG === true) {
                $message = '[' . $id. '][' . $code . '] ' . $description;
                \Yii::warning($message, self::className());
            }

            return $error;
        }

        // error
        return false;
    }

    /**
     * Finding the relationships of each object and connecting
     * them to helps us to access relationships of object.
     *
     * @param string $className the relation class's name
     * @param mixed $value the value to set relation
     * @return mixed
     * @throws UnknownClassException
     */
    private function joinRelations($className, $value)
    {
        if (AH::isAssociative($value)) {
            $class = new $className($value);
            if ($class instanceof Object) {
                return $class;
            }

            $message = $className . ' isn\'t a response object.';
            throw new UnknownClassException($message);
        }

        if (AH::isIndexed($value)) {
            $output = [];
            foreach ($value as $_name => $_value) {
                $relation = $this->joinRelations($className, $_value);
                $output[$_name] = $relation;
            }

            return $output;
        }

        return $value;
    }

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    abstract protected function response();
}