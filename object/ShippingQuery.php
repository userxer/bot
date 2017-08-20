<?php namespace bot\object;

/**
 * This object contains information about an
 * incoming shipping query.
 *
 * @method bool hasId()
 * @method bool hasFrom()
 * @method bool hasInvoicePayload()
 * @method bool hasShippingAddress()
 * @method string getId($default = null)
 * @method User getFrom($default = null)
 * @method string getInvoicePayload($default = null)
 * @method ShippingAddress getShippingAddress($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class ShippingQuery
 * @package bot\object
 * @link https://core.telegram.org/bots/api#shippingquery
 */
class ShippingQuery extends Object
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
            'from' => User::className(),
            'shipping_address' => ShippingAddress::className()
        ];
    }
}