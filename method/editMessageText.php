<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Use this method to edit text and game messages sent by the bot or via the bot (for inline bots).
 * On success, if edited message is sent by the bot,
 * the edited Message is returned,
 * otherwise True is returned.
 *
 * @method Message|true|Error send()
 * @method bool hasChatId()
 * @method bool hasMessageId()
 * @method bool hasInlineMessageId()
 * @method bool hasText()
 * @method bool hasParseMode()
 * @method bool hasDisableWebPagePreview()
 * @method bool hasReplyMarkup()
 * @method $this setChatId($integer)
 * @method $this setMessageId($integer)
 * @method $this setInlineMessageId($string)
 * @method $this setText($string)
 * @method $this setParseMode($string)
 * @method $this setDisableWebPagePreview($boolean)
 * @method $this setReplyMarkup($markup)
 * @method $this delChatId()
 * @method $this delMessageId()
 * @method $this delInlineMessageId()
 * @method $this delText()
 * @method $this delParseMode()
 * @method $this delDisableWebPagePreview()
 * @method $this delReplyMarkup()
 * @method string|int getChatId($default = null)
 * @method int getMessageId($default = null)
 * @method string getInlineMessageId($default = null)
 * @method string getText($default = null)
 * @method string getParseMode($default = null)
 * @method bool getDisableWebPagePreview($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class editMessageText
 * @package bot\method
 * @link https://core.telegram.org/bots/api#editmessagetext
 */
class editMessageText extends Method
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