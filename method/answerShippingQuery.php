<?php namespace bot\method;

use bot\object\Error;
use bot\object\ShippingOption;

/**
 * If you sent an invoice requesting a shipping address and the parameter is_flexible
 * was specified, the Bot API will send an Update with a shipping_query field to the bot.
 * Use this method to reply to shipping queries.
 * On success, True is returned.
 *
 * @method true|Error send()
 * @method bool hasShippingQueryId()
 * @method bool hasOk()
 * @method bool hasErrorMessage()
 * @method bool hasShippingOptions()
 * @method $this setShippingQueryId($string)
 * @method $this setOk($boolean)
 * @method $this setErrorMessage($string)
 * @method $this setShippingOptions($option)
 * @method $this delShippingQueryId()
 * @method $this delOk()
 * @method $this delErrorMessage()
 * @method $this delShippingOptions()
 * @method string getShippingQueryId($default = null)
 * @method bool getOk($default = null)
 * @method string getErrorMessage($default = null)
 * @method ShippingOption[] getShippingOptions($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class answerShippingQuery
 * @package bot\method
 * @link https://core.telegram.org/bots/api#answershippingquery
 */
class answerShippingQuery extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return true;
    }
}