<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * Use this method to send text messages. On success,
 * the sent Message is returned.
 *
 * @method Message|Error send()
 * @method bool hasChatId()
 * @method bool hasText()
 * @method bool hasParseMode()
 * @method bool hasDisableWebPagePreview()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setChatId($integer)
 * @method $this setText($string)
 * @method $this setParseMode($string)
 * @method $this setDisableWebPagePreview($boolean)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this remChatId()
 * @method $this remText()
 * @method $this remParseMode()
 * @method $this remDisableWebPagePreview()
 * @method $this remDisableNotification()
 * @method $this remReplyToMessageId()
 * @method $this remReplyMarkup()
 * @method string|int getChatId($default = null)
 * @method string getText($default = null)
 * @method string getParseMode($default = null)
 * @method bool getDisableWebPagePreview($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendMessage
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendmessage
 */
class sendMessage extends Method
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