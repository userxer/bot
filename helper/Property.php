<?php namespace bot\helper;

use yii\base\Object;

/**
 * These properties are used in objects and
 * add abilities to them.
 *
 * @property string $key
 * @property string $name
 * @property string $action
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Property
 * @package bot\helper
 */
class Property extends Object
{

    /**
     * @var string of the property full name
     */
    private $_key;

    /**
     * @var string of the property correct name
     */
    private $_name;

    /**
     * @var string the activity you intend to do with this property
     */
    private $_action;

    /**
     * Property constructor.
     * @param string $key the property full name
     */
    public function __construct($key)
    {
        $this->_key = $key;
        parent::__construct();
    }

    /**
     * The property full name.
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * The property correct name.
     * @return string
     */
    public function getName()
    {
        if ($this->_name == null) {
            $pattern = '/([A-Z])/';
            $key = substr($this->_key, 3);

            $name = lcfirst($key);
            $pregName = preg_replace($pattern, '_$1', $name);
            $this->_name = strtolower($pregName);
        }

        return $this->_name;
    }

    /**
     * The activity you intend to do with
     * this property.
     *
     * @return mixed
     * @throws \Exception
     */
    public function getAction()
    {
        if ($this->_action == null) {
            $actions = ['set', 'get', 'has', 'rem'];
            foreach ($actions as $action) {
                $pattern = '/^' . $action . '(.+)/';
                $preg = preg_match($pattern, $this->_key, $vars);

                if ($preg && is_array($vars)) {
                    $this->_action = $action;
                    return $this->_action;
                }
            }

            $info = get_class($this) . "::$this->_key()";
            throw new \Exception('Calling unknown method: ' . $info);
        }

        return $this->_action;
    }
}