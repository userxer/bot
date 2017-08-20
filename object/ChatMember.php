<?php namespace bot\object;

/**
 * This object contains information about one member of the chat.
 *
 * @method bool hasUser()
 * @method bool hasStatus()
 * @method bool hasUntilDate()
 * @method bool hasCanBeEdited()
 * @method bool hasCanChangeInfo()
 * @method bool hasCanPostMessages()
 * @method bool hasCanEditMessages()
 * @method bool hasCanDeleteMessages()
 * @method bool hasCanInviteUsers()
 * @method bool hasCanRestrictMembers()
 * @method bool hasCanPinMessages()
 * @method bool hasCanPromoteMembers()
 * @method bool hasCanSendMessages()
 * @method bool hasCanSendMediaMessages()
 * @method bool hasCanSendOtherMessages()
 * @method bool hasCanAddWebPagePreviews()
 * @method User getUser($default = null)
 * @method string getStatus($default = null)
 * @method int getUntilDate($default = null)
 * @method bool getCanBeEdited($default = null)
 * @method bool getCanChangeInfo($default = null)
 * @method bool getCanPostMessages($default = null)
 * @method bool getCanEditMessages($default = null)
 * @method bool getCanDeleteMessages($default = null)
 * @method bool getCanInviteUsers($default = null)
 * @method bool getCanRestrictMembers($default = null)
 * @method bool getCanPinMessages($default = null)
 * @method bool getCanPromoteMembers($default = null)
 * @method bool getCanSendMessages($default = null)
 * @method bool getCanSendMediaMessages($default = null)
 * @method bool getCanSendOtherMessages($default = null)
 * @method bool getCanAddWebPagePreviews($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class ChatMember
 * @package bot\object
 * @link https://core.telegram.org/bots/api#chatmember
 */
class ChatMember extends Object
{

    /**
     * Check out the user status is Creator or not.
     * @return bool
     */
    public function isCreator()
    {
        return $this->getStatus() == 'creator';
    }

    /**
     * Check out the user status is Administrator or not.
     * @return bool
     */
    public function isAdministrator()
    {
        return $this->getStatus() == 'administrator';
    }

    /**
     * Check out the user status is Member or not.
     * @return bool
     */
    public function isMember()
    {
        return $this->getStatus() == 'member';
    }

    /**
     * Check out the user status is Left or not.
     * @return bool
     */
    public function isLeft()
    {
        return $this->getStatus() == 'left';
    }

    /**
     * Check out the user status is Kicked or not.
     * @return bool
     */
    public function isKicked()
    {
        return $this->getStatus() == 'kicked';
    }

    /**
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    protected function relations()
    {
        return [
            'user' => User::className()
        ];
    }
}