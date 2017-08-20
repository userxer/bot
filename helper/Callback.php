<?php namespace bot\helper;

use yii\helpers\ArrayHelper as AH;

/**
 * Call a callback with an array of parameters.
 *
 * @property mixed $result
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Callback
 * @package bot\helper
 * @link http://php.net/manual/de/function.call-user-func.php
 * @link http://php.net/manual/de/function.call-user-func-array.php
 */
abstract class Callback
{

    /**
     * Call a user function given with an
     * array of parameters
     *
     * @param string|array|callable $callback
     * @param array $params
     * @return mixed
     */
    public static function call($callback, array $params = [])
    {
        if (is_array($callback) && sizeof($callback) == 2) {
            $class = $callback[0];
            $method = $callback[1];
            return self::callMethod($class, $method, $params);
        }

        return self::callFunction($callback, $params);
    }

    /**
     * Call a user function given with an
     * array of parameters
     *
     * @param string|callable $callback
     * @param array $params
     * @return mixed
     */
    public static function callFunction($callback, array $params = [])
    {
        $reflection = new \ReflectionFunction($callback);
        $arguments = self::getArguments($reflection, $params);
        return call_user_func_array($callback, $arguments);
    }

    /**
     * Call a user function given with an
     * array of parameters
     *
     * @param string|object $class
     * @param string $method
     * @param array $params
     * @return mixed
     */
    public static function callMethod($class, $method, array $params = [])
    {
        $reflection = new \ReflectionMethod($class, $method);
        $arguments = self::getArguments($reflection, $params);
        return call_user_func_array([$class, $method], $arguments);
    }

    /**
     * @param object $reflection
     * @param array $params
     * @return array
     */
    private static function getArguments($reflection, array $params = [])
    {
        $output = [];
        $arguments = $reflection->getParameters();
        foreach ($arguments as $argument) {
            /* @var object $argument */
            $name = $argument->getName();
            if (AH::keyExists($name, $params)) {
                $output[] = $params[$name];
            }
            else {
                $output[] = $argument->getDefaultValue();
            }
        }

        return $output;
    }
}