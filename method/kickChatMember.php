<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to kick a user from a group or a supergroup.
 * In the case of supergroups, the user will not be able to return to the group on their own using invite links, etc.,
 * unless unbanned first. The bot must be an administrator in the group for this to work.
 * Returns True on success.
 *
 * Note:
 * This will method only work if the ‘All Members Are Admins’ setting is off in the target group.
 * Otherwise members may only be removed by the group's creator or by the member that added them.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method bool hasUserId()
 * @method $this setChatId($integer)
 * @method $this setUserId($integer)
 * @method $this remChatId()
 * @method $this remUserId()
 * @method string|int getChatId()
 * @method int getUserId()
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class kickChatMember
 * @package bot\method
 * @link https://core.telegram.org/bots/api#kickchatmember
 */
class kickChatMember extends Method
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