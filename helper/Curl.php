<?php namespace bot\helper;

use yii\helpers\Json;
use yii\base\Exception;
use yii\helpers\ArrayHelper as AH;

/**
 * Curl is a library that lets you make HTTP requests in PHP.
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Curl
 * @package bot\helper
 * @link http://php.net/manual/de/function.curl-init.php
 */
class Curl
{

    /**
     * This value will hold HTTP-Status Code.
     * False if request was not successful.
     *
     * @var int HTTP-Status Code
     */
    public $code = null;

    /**
     * Holds curl-handler
     * @var resource object
     */
    private $_curl = null;

    /**
     * Custom options holder
     * @var array
     */
    private $_options = [];

    /**
     * curl default options.
     * @var array
     */
    private $_default_options = [
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_USERAGENT      => 'Yii2-Telegram-Bot-Agent',
    ];

    /**
     * Set curl option.
     *
     * @param string $key curl key of option
     * @param mixed $value curl value of option
     * @return $this
     */
    public function setOption($key, $value)
    {
        $this->_options[$key] = $value;
        return $this;
    }

    /**
     * Set curl options.
     *
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        foreach ($options as $key => $value) {
            $this->setOption($key, $value);
        }

        return $this;
    }

    /**
     * Unset a single curl option.
     *
     * @param string $key
     * @return $this
     */
    public function unsetOption($key)
    {
        AH::remove($this->_options, $key);
        return $this;
    }

    /**
     * Unset curl options.
     *
     * @param array $keys
     * @return $this
     */
    public function unsetOptions($keys)
    {
        foreach ($keys as $key) {
            $this->unsetOption($key);
        }

        return $this;
    }

    /**
     * Return a single option.
     *
     * @param string $key of option
     * @param mixed $default the default value to be returned if the specified array key does not exist. Not used when
     * getting value from an object.
     *
     * @return mixed
     */
    public function getOption($key, $default = null)
    {
        $os = $this->getOptions();
        $value = AH::getValue($os, $key, $default);

        return $value;
    }

    /**
     * Return merged curl options and keep keys!
     * @return array
     */
    public function getOptions()
    {
        $o = $this->_options;
        $do = $this->_default_options;
        return AH::merge($do, $o);
    }

    /**
     * Start performing HEAD-HTTP-Request
     *
     * @param string $url http address you want send request.
     * @return mixed
     */
    public function head($url)
    {
        return $this->send('HEAD', $url);
    }

    /**
     * Start performing GET-HTTP-Request
     *
     * @param string $url http address you want send request.
     * @param bool $raw if response body contains JSON and should be decoded
     * @return mixed
     */
    public function get($url, $raw = false)
    {
        return $this->send('GET', $url, $raw);
    }

    /**
     * Start performing POST-HTTP-Request
     *
     * @param string $url http address you want send request.
     * @param bool $raw if response body contains JSON and should be decoded
     * @return mixed
     */
    public function post($url, $raw = false)
    {
        return $this->send('POST', $url, $raw);
    }

    /**
     * Start performing DELETE-HTTP-Request
     *
     * @param string $url http address you want send request.
     * @param bool $raw if response body contains JSON and should be decoded
     * @return mixed
     */
    public function delete($url, $raw = false)
    {
        return $this->send('DELETE', $url, $raw);
    }

    /**
     * Start performing PUT-HTTP-Request
     *
     * @param string $url http address you want send request.
     * @param bool $raw if response body contains JSON and should be decoded
     * @return mixed
     */
    public function put($url, $raw = false)
    {
        return $this->send('PUT', $url, $raw);
    }

    /**
     * Performs HTTP request.
     *
     * @param string $method type of send model.
     * @param string $url http address you want send request.
     * @param bool $raw if response body contains JSON and should be decoded -> helper.
     * @return mixed
     */
    public function send($method, $url, $raw = false)
    {
        // method of request
        $method = strtoupper($method);
        $this->setOption(CURLOPT_CUSTOMREQUEST, $method);

        // is head request
        if ($method === 'HEAD') {
            $this->setOption(CURLOPT_NOBODY, true);
            $this->unsetOption(CURLOPT_WRITEFUNCTION);
        }

        // create curl
        $this->_curl = curl_init($url);
        curl_setopt_array($this->_curl, $this->getOptions());

        // sending request
        $response = curl_exec($this->_curl);

        // debugging
        $code = CURLINFO_HTTP_CODE;
        $this->__checkError($response);
        $this->code = curl_getinfo($this->_curl, $code);

        // result
        if ($method === 'HEAD') return true;
        else {
            $result = $raw ? Json::decode($response, true) : $response;
            return $result;
        }
    }

    /**
     * Check out cur error
     * @param mixed $response
     * @throws Exception
     */
    private function __checkError($response)
    {
        if ($response === false) {
            $error = curl_errno($this->_curl);

            if ($error == 7) $this->code = 'timeout';
            else {
                $message = 'Curl request failed: ' . curl_error($this->_curl);
                throw new Exception($message, $error);
            }
        }
    }
}