<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to get the number of members in a chat.
 * Returns Int on success.
 *
 * @method int|Error send()
 * @method bool hasChatId()
 * @method $this setChatId($integer)
 * @method $this delChatId()
 * @method string|int getChatId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getChatMembersCount
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getchatmemberscount
 */
class getChatMembersCount extends Method
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