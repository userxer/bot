<?php namespace bot\object;

/**
 * This object represents information about an order.
 *
 * @method bool hasName()
 * @method bool hasPhoneNumber()
 * @method bool hasEmail()
 * @method bool hasShippingAddress()
 * @method string getName($default = null)
 * @method string getPhoneNumber($default = null)
 * @method string getEmail($default = null)
 * @method ShippingAddress getShippingAddress($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class OrderInfo
 * @package bot\object
 * @link https://core.telegram.org/bots/api#orderinfo
 */
class OrderInfo extends Object
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
            'shipping_address' => ShippingAddress::className()
        ];
    }
}