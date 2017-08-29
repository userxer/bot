<?php namespace bot\base;

use bot\InputFile;
use bot\helper\Curl;
use bot\object\File;
use yii\helpers\Json;
use bot\helper\Token;
use yii\helpers\ArrayHelper as AH;
use yii\base\InvalidParamException;

/**
 * All queries to the Telegram Bot API must be served over
 * HTTPS and need to be presented in this form:
 * ```https://api.telegram.org/bot<token>/METHOD_NAME```
 *
 * Telegram support GET and POST HTTP methods. Telegram support
 * four ways of passing parameters in Bot API requests:
 *
 * 1. URL query string
 * 2. application/x-www-form-urlencoded
 * 3. application/json (except for uploading files)
 * 4. multipart/form-data (use to upload files)
 *
 * Note:
 * If the request was successful and the result of the query can be found
 * in the ‘result’ field. In case of an unsuccessful request, the error is
 * explained in the ‘description’.
 *
 * An Integer ‘error_code’ field is also returned,
 * but its contents are subject to change in the future.
 * Some errors may also have an optional field ‘parameters’ of the type ResponseParameters,
 * which can help to automatically handle the error.
 *
 * 1. All methods in the Bot API are case-insensitive.
 * 2. All queries must be made using UTF-8.
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Request
 * @package bot\base
 * @link https://core.telegram.org/bots/api#making-requests
 */
class Request extends Object
{

    /**
     * @var string the bot api server
     */
    const HOST = 'https://api.telegram.org';

    /**
     * @var string of bot token
     */
    protected $token;

    /**
     * Request constructor.
     * @param string $token
     */
    public function __construct($token = null)
    {
        $this->token = $token;
        parent::__construct();
    }

    /**
     * Checks if a property is set, i.e. defined and not null.
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing
     * `isset($object->property)`.
     *
     * Note that if the property is not defined,
     * false will be returned.
     *
     * @param string $name the property name or the event name
     * @return bool whether the named property is set (not null).
     * @see http://php.net/manual/en/function.isset.php
     */
    public function has($name)
    {
        $has = $this->__isset($name);
        return $has;
    }

    /**
     * Sets an object property to null.
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing
     * `unset($object->property)`.
     *
     * Note that if the property is not defined,
     * this method will do nothing.
     *
     * If the property is read-only, it will throw an exception.
     * @param string $name the property name
     * @return mixed the property last value
     * @see http://php.net/manual/en/function.unset.php
     */
    public function remove($name)
    {
        $this->__unset($name);
        return $this;
    }

    /**
     * Sets value of an object property.
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing
     * `$object->property = $value;`.
     *
     * @param string $name the property name or the event name
     * @param mixed $value the property value
     * @return $this
     */
    public function set($name, $value)
    {
        $this->__set($name, $value);
        return $this;
    }

    /**
     * Returns the value of an object property.
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing
     * `$value = $object->property;`.
     *
     * @param string $name the property name
     * @param  mixed $default the default value to be returned if the
     * specified array key does not exist. Not used when getting value
     * from an object.
     *
     * @return mixed the property value
     */
    public function get($name, $default = null)
    {
        if ($this->has($name)) {
            return $this->__get($name);
        }

        return $default;
    }

    /**
     * Send this request by token, in next time can use self::send()
     * method instead of this method.
     *
     * @param string $token a unique authentication token
     * @param array $params properties of object request
     * @return array is the a result
     */
    public function sendBy($token, $params = [])
    {
        $this->token = $token;
        return $this->send($params);
    }

    /**
     * Send this request by old token, you can use next token by
     * self::sendBy() method instead of this method.
     *
     * @param array $params properties of object request
     * @return array is the a result
     */
    public function send($params = [])
    {
        if ($this->token == null) {
            $message = 'There is no token in request.';
            throw new InvalidParamException($message);
        }

        \Yii::configure($this, $params);
        if ($this->__hasFile()) return $this->__sendFile();
        else return $this->__send();
    }

    /**
     * Checking whether the file is in this request will help us
     * to save the files in the memory system so that later we
     * do not need to upload files again.
     * 
     * @return bool
     */
    public function __hasFile()
    {
        $properties = $this->properties;
        foreach ($properties as $name => $value) {
            if (
                $value instanceof InputFile ||
                filter_var($value, FILTER_VALIDATE_URL)
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Send request with file, this method take
     * a few second to get back result.
     *
     * @return array
     */
    private function __sendFile()
    {
        $token = new Token($this->token);
        $cID = 'BOT:' . $token->id . ':';

        $duration = $this->get('cache_time', 0);
        $this->remove('cache_time');

        $properties = $this->properties;
        foreach ($properties as $name => $value) {
            if ($value instanceof InputFile) {
                $path = $value->getFilename();
                $fID = $cID . md5_file($path);

                if ($file_id = \Yii::$app->cache->get($fID)) {
                    $this->set($name, $file_id);
                }
            }
        }

        $res = $this->__send(function (Curl $curl) {
            $curl->setOptions([
                CURLOPT_RETURNTRANSFER  => true,
                CURLOPT_HTTPHEADER      => [
                    'Content-Type: multipart/form-data'
                ]
            ]);
        });

        if ($res['ok'] && isset($res['result'])) {
            foreach ($properties as $name => $value) {
                if (
                    $value instanceof InputFile &&
                    isset($response['result'][$name])
                ) {
                    $path = $value->getFilename();
                    $fID = $cID . md5_file($path);

                    $file = $response['result'][$name];
                    if (AH::isIndexed($file)) $file = end($file);
                    $file = new File($file);

                    if (
                        $file->hasFileId() &&
                        !\Yii::$app->get($fID, false)
                    ) {
                        $file_id = $file->getFileId();
                        \Yii::$app->cache->set($fID, $file_id, $duration);
                    }
                }
            }
        }

        return $res;
    }

    /**
     * Send request without file, this method take
     * a few second to get back result.
     *
     * @param callable $callback
     * @return array
     */
    private function __send($callback = null)
    {
        $curl = new Curl();
        $curl->setOption(CURLOPT_TIMEOUT, 30);
        $curl->setOption(CURLOPT_HEADER, false);
        $curl->setOption(CURLOPT_SAFE_UPLOAD, true);
        $curl->setOption(CURLOPT_SSL_VERIFYPEER, false);

        $params = [];
        foreach ($this->__toArray() as $name => $value) {
            if (is_array($value)) {
                $params[$name] = Json::encode($value);
                continue;
            }

            $params[$name] = $value;
        }

        $curl->setOption(CURLOPT_POSTFIELDS, $params);
        @call_user_func($callback, $curl);

        $url = self::HOST . '/bot' . $this->token . '/';
        return $curl->post($url, true);
    }
}