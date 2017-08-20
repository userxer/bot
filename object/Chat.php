<?php namespace bot\object;

/**
 * This object represents a chat.
 *
 * @method bool hasId()
 * @method bool hasType()
 * @method bool hasTitle()
 * @method bool hasUsername()
 * @method bool hasFirstName()
 * @method bool hasLastName()
 * @method bool hasAllMembersAreAdministrators()
 * @method bool hasPhoto()
 * @method bool hasDescription()
 * @method bool hasInviteLink()
 * @method int getId($default = null)
 * @method string getType($default = null)
 * @method string getTitle($default = null)
 * @method string getUsername($default = null)
 * @method string getFirstName($default = null)
 * @method string getLastName($default = null)
 * @method bool getAllMembersAreAdministrators($default = null)
 * @method ChatPhoto getPhoto($default = null)
 * @method string getDescription($default = null)
 * @method string getInviteLink($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Chat
 * @package bot\object
 * @link https://core.telegram.org/bots/api#chat
 */
class Chat extends Object
{

    /**
     * Check out the chat is Private or not.
     * @return bool
     */
    public function isPrivate()
    {
        return $this->getType() == 'private';
    }

    /**
     * Check out the chat is Group or not.
     * @return bool
     */
    public function isGroup()
    {
        return $this->getType() == 'group';
    }

    /**
     * Check out the chat is SuperGroup or not.
     * @return bool
     */
    public function isSuperGroup()
    {
        return $this->getType() == 'supergroup';
    }

    /**
     * Check out the chat is Channel or not.
     * @return bool
     */
    public function isChannel()
    {
        return $this->getType() == 'channel';
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
            'photo' => ChatPhoto::className()
        ];
    }
}