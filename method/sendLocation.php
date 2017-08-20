<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * Use this method to send point on the map.
 * On success, the sent Message is returned.
 *
 * @method Message|Error send()
 * @method bool hasChatId()
 * @method bool hasLatitude()
 * @method bool hasLongitude()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setChatId($integer)
 * @method $this setLatitude($float)
 * @method $this setLongitude($float)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this delChatId()
 * @method $this delLatitude()
 * @method $this delLongitude()
 * @method $this delDisableNotification()
 * @method $this delReplyToMessageId()
 * @method $this delReplyMarkup()
 * @method string|int getChatId($default = null)
 * @method float getLatitude($default = null)
 * @method float getLongitude($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendLocation
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendlocation
 */
class sendLocation extends Method
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