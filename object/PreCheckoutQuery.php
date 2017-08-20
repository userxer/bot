<?php namespace bot\object;

/**
 * This object contains information about an
 * incoming pre-checkout query.
 *
 * @method bool hasId()
 * @method bool hasFrom()
 * @method bool hasCurrency()
 * @method bool hasTotalAmount()
 * @method bool hasInvoicePayload()
 * @method bool hasShippingOptionId()
 * @method bool hasOrderInfo()
 * @method string getId($default = null)
 * @method User getFrom($default = null)
 * @method string getCurrency($default = null)
 * @method int getTotalAmount($default = null)
 * @method string getInvoicePayload($default = null)
 * @method string getShippingOptionId($default = null)
 * @method OrderInfo getOrderInfo($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class PreCheckoutQuery
 * @package bot\object
 * @link https://core.telegram.org/bots/api#precheckoutquery
 */
class PreCheckoutQuery extends Object
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
            'order_info' => OrderInfo::className()
        ];
    }
}