<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;

/**
 * Use this method to forward messages of any kind. 
 * On success, the sent Message is returned.
 *
 * @method Message|Error send()
 * @method bool hasChatId()
 * @method bool hasFromChatId()
 * @method bool hasDisableNotification()
 * @method bool hasMessageId()
 * @method $this setChatId($integer)
 * @method $this setFromChatId($integer)
 * @method $this setDisableNotification($boolean)
 * @method $this setMessageId($integer)
 * @method $this remChatId()
 * @method $this remFromChatId()
 * @method $this remDisableNotification()
 * @method $this remMessageId()
 * @method string|int getChatId($default = null)
 * @method string|int getFromChatId($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getMessageId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class forwardMessage
 * @package bot\method
 * @link https://core.telegram.org/bots/api#forwardmessage
 */
class forwardMessage extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return Message::className();
    }
}