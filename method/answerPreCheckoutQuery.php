<?php namespace bot\method;

use bot\object\Error;

/**
 * Once the user has confirmed their payment and shipping details,
 * the Bot API sends the final confirmation in the form of an Update with the
 * field pre_checkout_query. Use this method to respond to such pre-checkout queries.
 * On success, True is returned.
 *
 * Note:
 * The Bot API must receive an answer within 10 seconds
 * after the pre-checkout query was sent.
 *
 * @method true|Error send()
 * @method bool hasPreCheckoutQueryId()
 * @method bool hasOk()
 * @method bool hasErrorMessage()
 * @method $this setPreCheckoutQueryId($string)
 * @method $this setOk($boolean)
 * @method $this setErrorMessage($string)
 * @method $this delPreCheckoutQueryId()
 * @method $this delOk()
 * @method $this delErrorMessage()
 * @method string getPreCheckoutQueryId($default = null)
 * @method bool getOk($default = null)
 * @method string getErrorMessage($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class answerPreCheckoutQuery
 * @package bot\method
 * @link https://core.telegram.org/bots/api#answerprecheckoutquery
 */
class answerPreCheckoutQuery extends Method
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