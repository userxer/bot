<?php namespace bot\method;

use bot\InputFile;
use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * Use this method to send .webp stickers.
 * On success, the sent Message is returned.
 *
 * @method Message|Error send()
 * @method bool hasCacheTime()
 * @method bool hasChatId()
 * @method bool hasSticker()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setCacheTime($integer)
 * @method $this setChatId($integer)
 * @method $this setSticker($sticker)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this delCacheTime()
 * @method $this delChatId()
 * @method $this delSticker()
 * @method $this delDisableNotification()
 * @method $this delReplyToMessageId()
 * @method $this delReplyMarkup()
 * @method bool getCacheTime($default = null)
 * @method string|int getChatId($default = null)
 * @method string|InputFile getSticker($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendSticker
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendsticker
 */
class sendSticker extends Method
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