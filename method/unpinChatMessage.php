<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to unpin a message in a supergroup chat.
 * The bot must be an administrator in the chat for this
 * to work and must have the appropriate admin rights.
 * Returns True on success.
 *
 * @method string|Error send()
 * @method bool hasChatId()
 * @method $this setChatId($integer)
 * @method $this remChatId()
 * @method string|int getChatId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class unpinChatMessage
 * @package bot\method
 * @link https://core.telegram.org/bots/api#unpinchatmessage
 */
class unpinChatMessage extends Method
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