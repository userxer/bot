<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to unban a previously kicked user in a supergroup.
 * The user will not return to the group automatically, but will be able to join via link, etc.
 * The bot must be an administrator in the group for this to work.
 * Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method bool hasUserId()
 * @method $this setChatId($integer)
 * @method $this setUserId($integer)
 * @method $this delChatId()
 * @method $this delUserId()
 * @method string|int getChatId()
 * @method int getUserId()
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class unbanChatMember
 * @package bot\method
 * @link https://core.telegram.org/bots/api#unbanchatmember
 */
class unbanChatMember extends Method
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