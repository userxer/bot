<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to change the title of a chat. Titles can't be changed for private chats.
 * The bot must be an administrator in the chat for this to work and must have the
 * appropriate admin rights.
 * Returns True on success.
 *
 * Note:
 * In regular groups (non-supergroups), this method will only work if the ‘All
 * Members Are Admins’ setting is off in the target group.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method bool hasTitle()
 * @method $this setChatId($integer)
 * @method $this setTitle($string)
 * @method $this delChatId()
 * @method $this delTitle()
 * @method string|int getChatId($default = null)
 * @method string getTitle($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class setChatTitle
 * @package bot\method
 * @link https://core.telegram.org/bots/api#setchattitle
 */
class setChatTitle extends Method
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