<?php namespace bot\method;

use bot\InputFile;
use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * Use this method to send audio files, if you want Telegram clients to display them in the music player.
 * Your audio must be in the .mp3 format. On success, the sent Message is returned.
 * Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
 * For sending voice messages, use the sendVoice method instead.
 *
 * @method Message|Error send()
 * @method bool hasCacheTime()
 * @method bool hasChatId()
 * @method bool hasAudio()
 * @method bool hasCaption()
 * @method bool hasDuration()
 * @method bool hasPerformer()
 * @method bool hasTitle()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setCacheTime($integer)
 * @method $this setChatId($integer)
 * @method $this setAudio($audio)
 * @method $this setCaption($string)
 * @method $this setDuration($integer)
 * @method $this setPerformer($string)
 * @method $this setTitle($string)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this remCacheTime()
 * @method $this remChatId()
 * @method $this remAudio()
 * @method $this remCaption()
 * @method $this remDuration()
 * @method $this remPerformer()
 * @method $this remTitle()
 * @method $this remDisableNotification()
 * @method $this remReplyToMessageId()
 * @method $this remReplyMarkup()
 * @method int getCacheTime($default = null)
 * @method string|int getChatId($default = null)
 * @method string|InputFile getAudio($default = null)
 * @method string getCaption($default = null)
 * @method int getDuration($default = null)
 * @method string getPerformer($default = null)
 * @method string getTitle($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendAudio
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendaudio
 */
class sendAudio extends Method
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