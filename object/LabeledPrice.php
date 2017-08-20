<?php namespace bot\object;

/**
 * This object represents a portion of the
 * price for goods or services.
 *
 * @method bool hasLabel()
 * @method bool hasAmount()
 * @method string getLabel($default = null)
 * @method int getAmount($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class LabeledPrice
 * @package bot\object
 * @link https://core.telegram.org/bots/api#labeledprice
 */
class LabeledPrice extends Object
{

    /**
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    protected function relations()
    {
        return [];
    }
}