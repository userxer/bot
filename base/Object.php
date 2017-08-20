<?php namespace bot\base;

use yii\helpers\Json;
use yii\helpers\ArrayHelper as AH;

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
class Object
{
    
    /**
     * Returns the fully qualified name of this class.
     * @return string the fully qualified name of this class.
     */
    public static function className()
    {
        return get_called_class();
    }

    /**
     * Constructor.
     * The default implementation does two things:
     *
     * - Initializes the object with the given configuration `$config`.
     * - Call [[init()]].
     *
     * If this method is overridden in a child class,
     * it is recommended that
     *
     * - the last parameter of the constructor is a configuration array,
     *   like `$config` here.
     * - call the parent implementation at the end of the constructor.
     *
     * @param array $config name-value pairs that will be used
     * to initialize the object properties
     */
    public function __construct($config = [])
    {
        if (!empty($config)) {
            \Yii::configure($this, $config);
        }

        $this->init();
    }

    /**
     * @var array
     */
    private $properties = [];

    /**
     * Initializes the object.
     * This method is invoked at the end of the constructor after
     * the object is initialized with the given configuration.
     */
    public function init()
    {
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
        // find in class's methods
        $getter = 'get' . $name;
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }

        // find in class's properties
        if ($this->__isset($name)) {
            return $this->properties[$name];
        }

        return null;
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
        // set by class's methods
        $setter = 'set' . $name;
        if (method_exists($this, $setter)) {
            $this->$setter($value);
            return $value;
        }

        // set by class's properties
        $this->properties[$name] = $value;
        return $value;
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
        return AH::remove($properties, $name, null);
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
        $property = $this->fixPropertyName($name);
        $action = $this->findPropertyAction($name);

        // Delete property from class
        if ($action == 'del') {
            $this->__unset($property);
            return $this;
        }

        // Check out the property in class
        else if ($action == 'has') {
            $status = $this->__isset($property);
            return $status;
        }

        // Set the property in class
        else if ($action == 'set') {
            if (sizeof($params) > 0) {
                $this->__set($property, $params[0]);
                return $this;
            }
            else {
                $info = get_class($this) . '::' . $name . '(null)';
                $message = 'please send property[' . $property . '] value.';
                throw new \Exception('Invalid Value[' . $info . ']: ' . $message);
            }
        }

        // Get the class's property
        else if ($action == 'get') {
            $default = null;
            if (sizeof($params) > 0) {
                $default = $params[0];
            }

            if ($this->__isset($property)) {
                return $this->__get($property);
            }

            return $default;
        }

        // Not found any action
        else {
            $info = get_class($this) . "::$name()";
            throw new \Exception('Calling unknown method: ' . $info);
        }
    }

    /**
     * switch object to array,
     * sometimes we need to switch from object to array,
     * like when we like get class's json string.
     *
     * @return array
     */
    public function toArray()
    {
        $properties = $this->properties;
        return $this->toArrayMap($properties);
    }

    /**
     * switch object to json,
     * sometimes we need to switch from object to json,
     * like when we like get class's string.
     *
     * @return mixed
     */
    public function toJson()
    {
        $properties = $this->toArray();
        return Json::encode($properties);
    }

    /**
     * Sets an object properties to null.
     * When you want delete all properties from the class.
     */
    public function setEmpty()
    {
        $this->properties = [];
        return $this;
    }

    /**
     * @param string $name the method name
     * @return string the true property's name
     */
    private function fixPropertyName($name)
    {
        $pattern = '/([A-Z])/';
        $fLower = lcfirst(substr($name, 3));
        $replaced = preg_replace($pattern, '_$1', $fLower);

        return strtolower($replaced);
    }

    /**
     * @param string $name the method name
     * @return string the action's name
     * @throws \Exception
     */
    private function findPropertyAction($name)
    {
        foreach (['set', 'get', 'has', 'del'] as $action) {
            $pattern = '/^' . $action . '(.+)/';

            if (
                preg_match($pattern, $name, $matches) &&
                sizeof($matches) == 2
            ) {
                return $action;
            }
        }

        $info = get_class($this) . "::$name()";
        throw new \Exception('Calling unknown method: ' . $info);
    }

    /**
     * To array loop, help to change every rows,
     * change from object to array.
     *
     * @param array $array
     * @return array
     */
    private function toArrayMap(array $array)
    {
        $output = [];

        foreach ($array as $item => $value) {
            if ($value instanceof Object) {
                $output[$item] = $value->toArray();
            }
            else if (is_array($value)) {
                $output[$item] = $this->toArrayMap($value);
            }
            else {
                $output[$item] = $value;
            }
        }

        return $output;
    }
}