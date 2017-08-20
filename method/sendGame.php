<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Use this method to send a game.
 * On success, the sent Message is returned.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method bool hasGameShortName()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setChatId($integer)
 * @method $this setGameShortName($string)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this delChatId()
 * @method $this delGameShortName()
 * @method $this delDisableNotification()
 * @method $this delReplyToMessageId()
 * @method $this delReplyMarkup()
 * @method string|int getChatId($default = null)
 * @method string getGameShortName($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendGame
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendgame
 */
class sendGame extends Method
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