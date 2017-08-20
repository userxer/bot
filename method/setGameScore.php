<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;

/**
 * Use this method to set the score of the specified user in a game.
 * On success, if the message was sent by the bot, returns the edited Message, otherwise returns True.
 * Returns an error, if the new score is not greater than the user's
 * current score in the chat and force is False.
 *
 * @method Message|Error send()
 * @method bool hasUserId($integer)
 * @method bool hasScore($integer)
 * @method bool hasForce($boolean)
 * @method bool hasDisableEditMessage($boolean)
 * @method bool hasChatId($integer)
 * @method bool hasMessageId($integer)
 * @method bool hasInlineMessageId($string)
 * @method $this setUserId()
 * @method $this setScore()
 * @method $this setForce()
 * @method $this setDisableEditMessage()
 * @method $this setChatId()
 * @method $this setMessageId()
 * @method $this setInlineMessageId()
 * @method $this delUserId()
 * @method $this delScore()
 * @method $this delForce()
 * @method $this delDisableEditMessage()
 * @method $this delChatId()
 * @method $this delMessageId()
 * @method $this delInlineMessageId()
 * @method int getUserId($default = null)
 * @method int getScore($default = null)
 * @method bool getForce($default = null)
 * @method bool getDisableEditMessage($default = null)
 * @method int getChatId($default = null)
 * @method int getMessageId($default = null)
 * @method string getInlineMessageId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class setGameScore
 * @package bot\method
 * @link https://core.telegram.org/bots/api#setgamescore
 */
class setGameScore extends Method
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