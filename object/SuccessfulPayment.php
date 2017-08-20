<?php namespace bot\object;

/**
 * This object contains basic information about a
 * successful payment.
 *
 * @method bool hasCurrency()
 * @method bool hasTotalAmount()
 * @method bool hasInvoicePayload()
 * @method bool hasShippingOptionId()
 * @method bool hasOrderInfo()
 * @method bool hasTelegramPaymentChargeId()
 * @method bool hasProviderPaymentChargeId()
 * @method string getCurrency($default = null)
 * @method int getTotalAmount($default = null)
 * @method string getInvoicePayload($default = null)
 * @method string getShippingOptionId($default = null)
 * @method OrderInfo getOrderInfo($default = null)
 * @method string getTelegramPaymentChargeId($default = null)
 * @method string getProviderPaymentChargeId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class SuccessfulPayment
 * @package bot\object
 * @link https://core.telegram.org/bots/api#successfulpayment
 */
class SuccessfulPayment extends Object
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
            'order_info' => OrderInfo::className()
        ];
    }
}