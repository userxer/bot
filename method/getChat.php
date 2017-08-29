<?php namespace bot\method;

use bot\object\Chat;
use bot\object\Error;

/**
 * Use this method to get up to date information about the chat (current name of the user for one-on-one conversations,
 * current username of a user, group or channel, etc.).
 * Returns a Chat object on success.
 *
 * @method Chat|Error send()
 * @method bool hasChatId()
 * @method $this setChatId($integer)
 * @method $this remChatId()
 * @method string|int getChatId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getChat
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getchat
 */
class getChat extends Method
{

    /**
     * every methods have a response.
     * @return string the name of response class
     */
    protected function response()
    {
        return Chat::className();
    }
}