<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to send answers to callback queries sent from inline keyboards.
 * The answer will be displayed to the user as a notification at the top of the chat screen or as an alert.
 * On success, True is returned.
 *
 * Info:
 * Alternatively, the user can be redirected to the specified Game URL.
 * For this option to work, you must first create a game for your bot via BotFather and accept the terms.
 * Otherwise, you may use links like telegram.me/your_bot?start=XXXX that open your bot with a parameter.
 *
 * @method true|Error send()
 * @method bool hasCallbackQueryId()
 * @method bool hasText()
 * @method bool hasShowAlert()
 * @method bool hasUrl()
 * @method bool hasCacheTime()
 * @method $this setCallbackQueryId($string)
 * @method $this setText($string)
 * @method $this setShowAlert($boolean)
 * @method $this setUrl($string)
 * @method $this setCacheTime($integer)
 * @method $this delCallbackQueryId()
 * @method $this delText()
 * @method $this delShowAlert()
 * @method $this delUrl()
 * @method $this delCacheTime()
 * @method string getCallbackQueryId($default = null)
 * @method string getText($default = null)
 * @method bool getShowAlert($default = null)
 * @method string getUrl($default = null)
 * @method int getCacheTime($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class answerCallbackQuery
 * @package bot\method
 * @link https://core.telegram.org/bots/api#answercallbackquery
 */
class answerCallbackQuery extends Method
{

    /**
     * every methods have a response.
     * @return string the name of response class
     */
    protected function response()
    {
        return true;
    }
}