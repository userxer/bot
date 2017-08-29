<?php namespace bot\method;

use bot\InputFile;
use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * As of v.4.0, Telegram clients support rounded square mp4
 * videos of up to 1 minute long. Use this method to send
 * video messages. On success, the sent
 * Message is returned.
 *
 * @method Message|Error send()
 * @method bool hasCacheTime()
 * @method bool hasChatId()
 * @method bool hasVideoNote()
 * @method bool hasDuration()
 * @method bool hasLength()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setCacheTime($integer)
 * @method $this setChatId($integer)
 * @method $this setVideoNote($video)
 * @method $this setDuration($integer)
 * @method $this setLength($integer)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this remCacheTime()
 * @method $this remChatId()
 * @method $this remVideoNote()
 * @method $this remDuration()
 * @method $this remLength()
 * @method $this remDisableNotification()
 * @method $this remReplyToMessageId()
 * @method $this remReplyMarkup()
 * @method int getCacheTime($default = null)
 * @method string|int getChatId($default = null)
 * @method string|InputFile getVideoNote($default = null)
 * @method int getDuration($default = null)
 * @method int getLength($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendVideoNote
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendvideonote
 */
class sendVideoNote extends Method
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