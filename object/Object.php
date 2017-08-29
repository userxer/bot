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
     * Initializes the object.
     * This method is invoked at the end of the constructor after
     * the object is initialized with the given configuration.
     */
    public function init()
    {
        $relations = $this->relations();
        foreach ($relations as $name => $className) {
            if (
                class_exists($className) &&
                $this->__isset($name)
            ) {
                $baseValue = $this->__get($name);
                $value = $this->joinRelations($className, $baseValue);

                // set property by relation
                $this->__set($name, $value);
            }

            else if (!class_exists($className)) {
                $message = 'Not found relation: ' . $className;
                throw new UnknownClassException($message);
            }
        }

        parent::init();
    }

    /**
     * Finding the relationships of each object and connecting
     * them to helps us to access relationships of object.
     *
     * @param string $className name of object
     * @param mixed $value of relation
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
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    abstract protected function relations();
}