<?php namespace bot\method;

use bot\InputFile;
use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * Use this method to send photos.
 * On success, the sent Message is returned.
 *
 * @method Message|Error send()
 * @method bool hasCacheTime()
 * @method bool hasChatId()
 * @method bool hasPhoto()
 * @method bool hasCaption()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setCacheTime($integer)
 * @method $this setChatId($integer)
 * @method $this setPhoto($photo)
 * @method $this setCaption($string)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this delCacheTime()
 * @method $this delChatId()
 * @method $this delPhoto()
 * @method $this delCaption()
 * @method $this delDisableNotification()
 * @method $this delReplyToMessageId()
 * @method $this delReplyMarkup()
 * @method int getCacheTime($default = null)
 * @method string|int getChatId($default = null)
 * @method string|InputFile getPhoto($default = null)
 * @method string getCaption($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendPhoto
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendphoto
 */
class sendPhoto extends Method
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