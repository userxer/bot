<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * Use this method to send phone contacts.
 * On success, the sent Message is returned.
 *
 * @method Message|Error send()
 * @method bool hasChatId()
 * @method bool hasPhoneNumber()
 * @method bool hasFirstName()
 * @method bool hasLastName()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setChatId($integer)
 * @method $this setPhoneNumber($string)
 * @method $this setFirstName($string)
 * @method $this setLastName($string)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this remChatId()
 * @method $this remPhoneNumber()
 * @method $this remFirstName()
 * @method $this remLastName()
 * @method $this remDisableNotification()
 * @method $this remReplyToMessageId()
 * @method $this remReplyMarkup()
 * @method string|int getChatId($default = null)
 * @method string getPhoneNumber($default = null)
 * @method string getFirstName($default = null)
 * @method string getLastName($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 * 
 * Class sendContact
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendcontact
 */
class sendContact extends Method
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