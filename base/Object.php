<?php namespace bot\base;

use yii\helpers\Json;
use bot\helper\Property;
use yii\helpers\ArrayHelper as AH;
use yii\base\InvalidParamException;

/**
 * Object is the base class that implements the *property* feature.
 * property is defined by a getter method (e.g. `getLabel`),
 * and/or a setter method (e.g. `setLabel`).
 *
 * Property names are *case-insensitive*.
 * A property can be accessed like a member variable of an object.
 * Reading or writing a property will cause the invocationof
 * the corresponding getter or setter method.
 *
 * If a property has only a getter method and has no setter method,
 * it is considered as *read-only*.
 *
 * In this case, trying to modify the property
 * value will cause an exception.
 *
 * Besides the property feature, Object also introduces an important
 * object initialization life cycle. In particular, creating an new
 * instance of Object or its derived class will involve
 * the following life cycles sequentially:
 *
 * 1. the class constructor is invoked;
 * 2. object properties are initialized according to the given configuration;
 * 3. the `init()` method is invoked.
 *
 * In the above, both Step 2 and 3 occur at the end of the class constructor.
 * It is recommended that you perform object initialization in the `init()`
 * method because at that stage, the object
 * configuration is already applied.
 *
 * That is, a `$config` parameter (defaults to `[]`) should be
 * declared as the last parameter of the constructor,
 * and the parent implementation should be called
 * at the end of the constructor.
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Object
 * @package bot\base
 */
class Object extends \yii\base\Object
{

    /**
     * Each object consists of several properties.
     * These features make it possible to distinguish objects
     * from one another.
     *
     * @var array
     */
    protected $properties = [];

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
    public function __isset($name)
    {
        $properties = $this->properties;
        return AH::keyExists($name, $properties);
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
    public function __unset($name)
    {
        $properties = $this->properties;
        AH::remove($properties, $name);

        return true;
    }

    /**
     * Sets value of an object property.
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing
     * `$object->property = $value;`.
     *
     * @param string $name the property name or the event name
     * @param mixed $value the property value
     * @return mixed the property value
     */
    public function __set($name, $value)
    {
        $setter = 'set' . $name;
        if (method_exists($this, $setter)) {
            return parent::__set($name, $value);
        }

        $this->properties[$name] = $value;
        return $value;
    }

    /**
     * Returns the value of an object property.
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing
     * `$value = $object->property;`.
     *
     * @param string $name the property name
     * @return mixed the property value
     */
    public function __get($name)
    {
        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            return parent::__get($name);
        }

        if ($this->__isset($name)) {
            $properties = $this->properties;
            return AH::getValue($properties, $name);
        }

        return null;
    }

    /**
     * Calls the named method which is not a class method.
     *
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when an unknown method is being invoked.
     *
     * @param string $name the method name
     * @param array $params method parameters
     * @return mixed the method return value
     * @throws \Exception
     */
    public function __call($name, $params)
    {
        $property = new Property($name);

        $key = $property->getKey();
        $name = $property->getName();
        $action = $property->getAction();

        // remove property of object
        if ($action == 'rem') {
            $this->__unset($name);
            return $this;
        }

        // check availability or not
        if ($action == 'has') {
            $has = $this->__isset($name);
            return $has;
        }

        // set property of object
        if ($action == 'set') {
            if (sizeof($params) > 0) {
                $this->__set($name, $params[0]);
                return $this;
            }
            else {
                $info = $this->className() . '::' . $key . '($value)';
                $message = 'You must set property value in ' . $info;
                throw new InvalidParamException($message);
            }
        }

        // get property of object
        if ($action == 'get') {
            $default = sizeof($params) > 0 ? $params[0] : null;

            // if it exists
            if ($this->__isset($name)) {
                return $this->__get($name);
            }

            return $default;
        }

        // unauthorized activity
        return parent::__call($name, $params);
    }

    /**
     * Converting an object to its base state,
     * that is clearing all the properties that
     * make it distinct.
     *
     * @return bool
     */
    public function __toEmpty()
    {
        $this->properties = [];
        return true;
    }

    /**
     * Converting an object to a string will
     * be effective when we want to send an
     * object to another server.
     *
     * @return string
     */
    public function __toJson()
    {
        $array = $this->__toArray();
        return Json::encode($array);
    }

    /**
     * Converting an object to a array will
     * be effective, like when we want to convert
     * an object to json string.
     *
     * @return array
     */
    public function __toArray()
    {
        $properties = $this->properties;
        return $this->__toArrayMap($properties);
    }

    /**
     * Checking each level of the array to convert
     * an object to an array.
     *
     * @param array $array
     * @return array
     */
    private function __toArrayMap(array $array)
    {
        $output = [];

        foreach ($array as $item => $value) {
            if ($value instanceof Object) {
                $output[$item] = $value->__toArray();
            }
            else if (is_array($value)) {
                $output[$item] = $this->__toArrayMap($value);
            }
            else {
                $output[$item] = $value;
            }
        }

        return $output;
    }
}
