<?php namespace bot\base;

use bot\InputFile;
use bot\helper\Curl;
use bot\object\File;
use bot\helper\Token;
use yii\helpers\Json;
use yii\helpers\ArrayHelper as AH;

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
     * Checks if a property is set, i.e.
     * defined and not null.
     *
     * Note that if the property is not defined,
     * false will be returned.
     *
     * @param string $name the property name or the event name
     * @return bool whether the named property is set (not null).
     */
    public function has($name)
    {
        return $this->__isset($name);
    }

    /**
     * Sets an object property to null.
     *
     * Note that if the property is not defined,
     * this method will do nothing.
     *
     * If the property is read-only,
     * it will throw an exception.
     *
     * @param string $name the property name
     * @return $this
     */
    public function delete($name)
    {
        $this->__unset($name);
        return $this;
    }

    /**
     * Sets value of an object property.
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
     *
     * @param string $name the property name
     * @param mixed $default the default value to be returned if the specified array
     * key does not exist. Not used when getting value from an object.
     *
     * @return mixed
     */
    public function get($name, $default = null)
    {
        if ($this->__isset($name)) {
            return $this->__get($name);
        }

        return $default;
    }

    /**
     * Send this request by this method.
     *
     * @param string $token the bot token string
     * @return array
     */
    public function sendBy($token)
    {
        if ($this->hasFile()) {
            return $this->sendFile($token);
        }

        return $this->sendRequest($token);
    }

    /**
     * If request have file is better send with this method.
     *
     * @param string $token the telegram's bot token
     * @return array
     */
    private function sendFile($token)
    {
        // Cache ID
        $tObj = new Token($token);
        $cID = 'B:' . $tObj->id . ':';

        // Cache duration time
        $duration = $this->get('cache_time', 0);
        $this->delete('cache_time');

        // Replace files instead short ID as file.
        $this->replaceFileID($cID);

        // Send Request
        $res = $this->sendRequest($token, function (Curl $curl) {
            $curl->setOptions([
                CURLOPT_SAFE_UPLOAD     => true,
                CURLOPT_HTTPHEADER      => [
                    'Content-Type: multipart/form-data'
                ]
            ]);
        });

        // Set cache duration again
        $this->set('cache_time', $duration);

        // Save Files IDs
        $this->saveFileID($cID, $duration, $res);
        return $res;
    }

    /**
     * Send http request with this request params to
     * telegram server safely.
     *
     * @param string $token the telegram's bot token
     * @param string|array|callable $callback
     * @return array
     */
    private function sendRequest($token, $callback = null)
    {
        $curl = new Curl();
        $curl->setOption(CURLOPT_TIMEOUT, 30);
        $curl->setOption(CURLOPT_HEADER, false);
        $curl->setOption(CURLOPT_RETURNTRANSFER, true);
        $curl->setOption(CURLOPT_SSL_VERIFYPEER, false);

        $params = [];
        foreach ($this->toArray() as $key => $value) {
            if (is_array($value)) {
                $params[$key] = Json::encode($value);
                continue;
            }

            $params[$key] = $value;
        }

        $curl->setOption(CURLOPT_POSTFIELDS, $params);
        @call_user_func($callback, $curl);

        // send http request
        $baseUrl = 'https://api.telegram.org/bot{token}/';
        $url = str_replace('{token}', $token, $baseUrl);
        return $curl->post($url, true);
    }

    /**
     * Check out this request to find File,
     * if find any file return true, otherwise
     * return false.
     *
     * @return bool
     */
    private function hasFile()
    {
        foreach ($this->toArray() as $key => $value) {
            if (
                $value instanceof InputFile ||
                filter_var($value, FILTER_VALIDATE_URL)
            )
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Replace file instead short ID as file.
     * @param string $cID the Cache id
     */
    private function replaceFileID($cID)
    {
        $params = $this->toArray();
        foreach ($params as $key => $value) {
            if ($value instanceof InputFile) {
                $path = $value->getFilename();
                $fID = $cID . md5_file($path);

                if ($file_id = \Yii::$app->cache->get($fID)) {
                    $this->set($key, $file_id);
                }
            }
        }
    }

    /**
     * Save file's IDs in yii cache.
     *
     * @param string $cID the Cache id
     * @param int $duration default duration in seconds before the cache will expire. If not set,
     * default [[defaultDuration]] value is used.
     * @param array $res the request response.
     * @throws \yii\base\InvalidConfigException
     */
    private function saveFileID($cID, $duration, $res)
    {
        if ($res['ok'] && isset($res['result'])) {
            $params = $this->toArray();
            foreach ($params as $key => $value) {
                if (
                    $value instanceof InputFile &&
                    isset($response['result'][$key])
                ) {
                    $path = $value->getFilename();
                    $fID = $cID . md5_file($path);

                    $file = $response['result'][$key];
                    if (AH::isIndexed($file)) {
                        $file = end($file);
                    }

                    $file = new File($file);
                    if ($file->hasFileId() && !\Yii::$app->get($fID, false)) {
                        $file_id = $file->getFileId();
                        \Yii::$app->cache->set($fID, $file_id, $duration);
                    }
                }
            }
        }
    }
}
