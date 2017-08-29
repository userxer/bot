<?php namespace bot\method;

use bot\object\Error;
use bot\object\ChatMember;

/**
 * Use this method to get information about a member of a chat.
 * Returns a ChatMember object on success.
 *
 * @method ChatMember|Error send()
 * @method bool hasChatId()
 * @method bool hasUserId()
 * @method $this setChatId($integer)
 * @method $this setUserId($integer)
 * @method $this remChatId()
 * @method $this remUserId()
 * @method string|int getChatId($default = null)
 * @method int getUserId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getChatMember
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getchatmember
 */
class getChatMember extends Method
{

    /**
     * every methods have a response.
     * @return string the name of response class
     */
    protected function response()
    {
        return ChatMember::className();
    }
}