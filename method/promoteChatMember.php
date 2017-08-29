<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to promote or demote a user in a supergroup
 * or a channel. The bot must be an administrator in the
 * chat for this to work and must have the appropriate
 * admin rights. Pass False for all boolean parameters
 * to demote a user. Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method bool hasUserId()
 * @method bool hasCanChangeInfo()
 * @method bool hasCanPostMessages()
 * @method bool hasCanEditMessages()
 * @method bool hasCanDeleteMessages()
 * @method bool hasCanInviteUsers()
 * @method bool hasCanRestrictMembers()
 * @method bool hasCanPinMessages()
 * @method bool hasCanPromoteMembers()
 * @method $this setChatId($integer)
 * @method $this setUserId($integer)
 * @method $this setCanChangeInfo($boolean)
 * @method $this setCanPostMessages($boolean)
 * @method $this setCanEditMessages($boolean)
 * @method $this setCanDeleteMessages($boolean)
 * @method $this setCanInviteUsers($boolean)
 * @method $this setCanRestrictMembers($boolean)
 * @method $this setCanPinMessages($boolean)
 * @method $this setCanPromoteMembers($boolean)
 * @method $this remChatId()
 * @method $this remUserId()
 * @method $this remCanChangeInfo()
 * @method $this remCanPostMessages()
 * @method $this remCanEditMessages()
 * @method $this remCanDeleteMessages()
 * @method $this remCanInviteUsers()
 * @method $this remCanRestrictMembers()
 * @method $this remCanPinMessages()
 * @method $this remCanPromoteMembers()
 * @method int getChatId($default = null)
 * @method int getUserId($default = null)
 * @method bool getCanChangeInfo($default = null)
 * @method bool getCanPostMessages($default = null)
 * @method bool getCanEditMessages($default = null)
 * @method bool getCanDeleteMessages($default = null)
 * @method bool getCanInviteUsers($default = null)
 * @method bool getCanRestrictMembers($default = null)
 * @method bool getCanPinMessages($default = null)
 * @method bool getCanPromoteMembers($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class promoteChatMember
 * @package bot\method
 * @link https://core.telegram.org/bots/api#promotechatmember
 */
class promoteChatMember extends Method
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