<?php namespace bot\object;

use yii\helpers\ArrayHelper as AH;
use yii\base\UnknownClassException;

/**
 * Available types
 * All types used in the Bot API responses are represented as JSON-objects.
 * It is safe to use 32-bit signed integers for storing all Integer
 * fields unless otherwise noted.
 *
 * -- Optional fields may be not returned
 *    when irrelevant.
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Object
 * @package bot\object
 * @link https://core.telegram.org/bots/api#available-types
 */
abstract class Object extends \bot\base\Object
{

    /**
     * Object constructor.
     * @param array $properties
     */
    public function __construct(array $properties)
    {
        parent::__construct($properties);
    }

    /**
     * Initializes the object.
     * This method is invoked at the end of the constructor after
     * the object is initialized with the given configuration.
     */
    public function init()
    {
        foreach ($this->relations() as $property => $className) {

            // real relation
            if (class_exists($className) && $this->__isset($property)) {
                $baseValue = $this->__get($property);
                $value = $this->introduceMap($className, $baseValue);

                // set property with owen relation
                $this->__set($property, $value);
            }

            // not found relation
            else if (!class_exists($className)) {
                $message = $className . ' not found in relations ' . get_class($this);
                throw new UnknownClassException($message);
            }
        }

        parent::init();
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
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    abstract protected function relations();
}