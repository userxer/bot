<?php namespace bot\keyboard\button;

use bot\object\CallbackGame;

/**
 * This object represents one button of an inline keyboard.
 * You must use exactly one of the optional fields.
 *
 * @method bool hasText()
 * @method bool hasUrl()
 * @method bool hasCallbackData()
 * @method bool hasSwitchInlineQuery()
 * @method bool hasSwitchInlineQueryCurrentChat()
 * @method bool hasCallbackGame()
 * @method bool hasPay()
 * @method $this setText($string)
 * @method $this setUrl($string)
 * @method $this setCallbackData($string)
 * @method $this setSwitchInlineQuery($string)
 * @method $this setSwitchInlineQueryCurrentChat($string)
 * @method $this setCallbackGame($callbackGame)
 * @method $this setPay($bool)
 * @method $this remText()
 * @method $this remUrl()
 * @method $this remCallbackData()
 * @method $this remSwitchInlineQuery()
 * @method $this remSwitchInlineQueryCurrentChat()
 * @method $this remCallbackGame()
 * @method $this remPay()
 * @method string getText($default = null)
 * @method string getUrl($default = null)
 * @method string getCallbackData($default = null)
 * @method string getSwitchInlineQuery($default = null)
 * @method string getSwitchInlineQueryCurrentChat($default = null)
 * @method CallbackGame getCallbackGame($default = null)
 * @method bool getPay($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 * 
 * Class InlineKeyboardButton
 * @package bot\keyboard\button
 * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
 */
class InlineKeyboardButton extends Button
{

    /**
     * InlineKeyboardButton constructor.
     * @param array|string $properties
     */
    public function __construct($properties = [])
    {
        if (is_string($properties)) {
            $this->__set('text', $properties);
            $properties = [];
        }

        parent::__construct($properties);
    }
}
