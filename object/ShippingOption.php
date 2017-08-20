<?php namespace bot\object;

/**
 * This object represents one shipping option.
 *
 * @method bool hasId()
 * @method bool hasTitle()
 * @method bool hasPrices()
 * @method string getId($default = null)
 * @method string getTitle($default = null)
 * @method LabeledPrice[] getPrices($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class ShippingOption
 * @package bot\object
 * @link https://core.telegram.org/bots/api#shippingoption
 */
class ShippingOption extends Object
{

    /**
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    protected function relations()
    {
        return [
            'prices' => LabeledPrice::className()
        ];
    }
}