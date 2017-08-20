<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;
use bot\object\LabeledPrice;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Use this method to send invoices.
 * On success, the sent Message is returned.
 *
 * @method Message|Error send()
 * @method bool hasChatId()
 * @method bool hasTitle()
 * @method bool hasDescription()
 * @method bool hasPayload()
 * @method bool hasProviderToken()
 * @method bool hasStartParameter()
 * @method bool hasCurrency()
 * @method bool hasPrices()
 * @method bool hasPhotoUrl()
 * @method bool hasPhotoSize()
 * @method bool hasPhotoWidth()
 * @method bool hasPhotoHeight()
 * @method bool hasNeedName()
 * @method bool hasNeedPhone_number()
 * @method bool hasNeedEmail()
 * @method bool hasNeedShippingAddress()
 * @method bool hasIsFlexible()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setChatId($integer)
 * @method $this setTitle($string)
 * @method $this setDescription($string)
 * @method $this setPayload($string)
 * @method $this setProviderToken($string)
 * @method $this setStartParameter($string)
 * @method $this setCurrency($string)
 * @method $this setPrices($array)
 * @method $this setPhotoUrl($string)
 * @method $this setPhotoSize($integer)
 * @method $this setPhotoWidth($integer)
 * @method $this setPhotoHeight($integer)
 * @method $this setNeedName($boolean)
 * @method $this setNeedPhone_number($boolean)
 * @method $this setNeedEmail($boolean)
 * @method $this setNeedShippingAddress($boolean)
 * @method $this setIsFlexible($boolean)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this delChatId()
 * @method $this delTitle()
 * @method $this delDescription()
 * @method $this delPayload()
 * @method $this delProviderToken()
 * @method $this delStartParameter()
 * @method $this delCurrency()
 * @method $this delPrices()
 * @method $this delPhotoUrl()
 * @method $this delPhotoSize()
 * @method $this delPhotoWidth()
 * @method $this delPhotoHeight()
 * @method $this delNeedName()
 * @method $this delNeedPhone_number()
 * @method $this delNeedEmail()
 * @method $this delNeedShippingAddress()
 * @method $this delIsFlexible()
 * @method $this delDisableNotification()
 * @method $this delReplyToMessageId()
 * @method $this delReplyMarkup()
 * @method int getChatId($default = null)
 * @method string getTitle($default = null)
 * @method string getDescription($default = null)
 * @method string getPayload($default = null)
 * @method string getProviderToken($default = null)
 * @method string getStartParameter($default = null)
 * @method string getCurrency($default = null)
 * @method LabeledPrice[] getPrices($default = null)
 * @method string getPhotoUrl($default = null)
 * @method int getPhotoSize($default = null)
 * @method int getPhotoWidth($default = null)
 * @method int getPhotoHeight($default = null)
 * @method bool getNeedName($default = null)
 * @method bool getNeedPhone_number($default = null)
 * @method bool getNeedEmail($default = null)
 * @method bool getNeedShippingAddress($default = null)
 * @method bool getIsFlexible($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendInvoice
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendinvoice
 */
class sendInvoice extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return Message::className();
    }
}