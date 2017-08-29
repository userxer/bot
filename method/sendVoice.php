<?php namespace bot\method;

use bot\InputFile;
use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message.
 * For this to work, your audio must be in an .ogg file encoded with OPUS (other formats may be sent as Audio or Document).
 * On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size,
 * this limit may be changed in the future.
 *
 * @method Message|Error send()
 * @method bool hasCacheTime()
 * @method bool hasChatId()
 * @method bool hasVoice()
 * @method bool hasCaption()
 * @method bool hasDuration()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setCacheTime($integer)
 * @method $this setChatId($integer)
 * @method $this setVoice($voice)
 * @method $this setCaption($string)
 * @method $this setDuration($integer)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this remCacheTime()
 * @method $this remChatId()
 * @method $this remVoice()
 * @method $this remCaption()
 * @method $this remDuration()
 * @method $this remDisableNotification()
 * @method $this remReplyToMessageId()
 * @method $this remReplyMarkup()
 * @method int getCacheTime($default = null)
 * @method string|int getChatId($default = null)
 * @method string|InputFile getVoice($default = null)
 * @method string getCaption($default = null)
 * @method int getDuration($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendVoice
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendvoice
 */
class sendVoice extends Method
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