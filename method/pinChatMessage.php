<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to pin a message in a supergroup.
 * The bot must be an administrator in the chat for this to work and must
 * have the appropriate admin rights.
 * Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method bool hasMessageId()
 * @method bool hasDisableNotification()
 * @method $this setChatId($integer)
 * @method $this setMessageId($integer)
 * @method $this setDisableNotification($boolean)
 * @method $this delChatId()
 * @method $this delMessageId()
 * @method $this delDisableNotification()
 * @method string|int getChatId($default = null)
 * @method int getMessageId($default = null)
 * @method bool getDisableNotification($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class pinChatMessage
 * @package bot\method
 * @link https://core.telegram.org/bots/api#pinchatmessage
 */
class pinChatMessage extends Method
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