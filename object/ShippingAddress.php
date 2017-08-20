<?php namespace bot\object;

/**
 * This object represents a shipping address.
 *
 * @method bool hasCountryCode()
 * @method bool hasState()
 * @method bool hasCity()
 * @method bool hasStreetLine1()
 * @method bool hasStreetLine2()
 * @method bool hasPostCode()
 * @method bool getCountryCode($default = null)
 * @method bool getState($default = null)
 * @method bool getCity($default = null)
 * @method bool getStreetLine1($default = null)
 * @method bool getStreetLine2($default = null)
 * @method bool getPostCode($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class ShippingAddress
 * @package bot\object
 * @link https://core.telegram.org/bots/api#shippingaddress
 */
class ShippingAddress extends Object
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