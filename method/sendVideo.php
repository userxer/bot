<?php namespace bot\method;

use bot\InputFile;
use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * Use this method to send video files, Telegram clients support mp4 videos (other formats may be sent as Document).
 * On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size,
 * this limit may be changed in the future.
 *
 * @method Message|Error send()
 * @method bool hasCacheTime()
 * @method bool hasChatId()
 * @method bool hasVideo()
 * @method bool hasDuration()
 * @method bool hasWidth()
 * @method bool hasHeight()
 * @method bool hasCaption()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setCacheTime($integer)
 * @method $this setChatId($integer)
 * @method $this setVideo($video)
 * @method $this setDuration($integer)
 * @method $this setWidth($integer)
 * @method $this setHeight($integer)
 * @method $this setCaption($string)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this remCacheTime()
 * @method $this remChatId()
 * @method $this remVideo()
 * @method $this remDuration()
 * @method $this remWidth()
 * @method $this remHeight()
 * @method $this remCaption()
 * @method $this remDisableNotification()
 * @method $this remReplyToMessageId()
 * @method $this remReplyMarkup()
 * @method int getCacheTime($default = null)
 * @method string|int getChatId($default = null)
 * @method string|InputFile getVideo($default = null)
 * @method int getDuration($default = null)
 * @method int getWidth($default = null)
 * @method int getHeight($default = null)
 * @method string getCaption($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendVideo
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendvideo
 */
class sendVideo extends Method
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