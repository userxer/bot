<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Use this method to edit only the reply markup of messages sent by the bot
 * or via the bot (for inline bots). On success, if edited message is
 * sent by the bot, the edited Message is returned,
 * otherwise True is returned.
 *
 * @method Message|true|Error send()
 * @method bool hasChatId()
 * @method bool hasMessageId()
 * @method bool hasInlineMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setChatId($integer)
 * @method $this setMessageId($integer)
 * @method $this setInlineMessageId($string)
 * @method $this setReplyMarkup($markup)
 * @method $this remChatId()
 * @method $this remMessageId()
 * @method $this remInlineMessageId()
 * @method $this remReplyMarkup()
 * @method string|int getChatId($default = null)
 * @method int getMessageId($default = null)
 * @method string getInlineMessageId($default = null)
 * @method array|InlineKeyboardMarkup getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 * 
 * Class editMessageReplyMarkup
 * @package bot\method
 * @link https://core.telegram.org/bots/api#editmessagereplymarkup
 */
class editMessageReplyMarkup extends Method
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