<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an mp3 audio file. By default, this audio file will be sent by the user.
 * Alternatively, you can use input_message_content to send a message with the
 * specified content instead of the audio.

 * Note:
 * This will only work in Telegram versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 * @method bool hasAudioUrl()
 * @method bool hasTitle()
 * @method bool hasCaption()
 * @method bool hasPerformer()
 * @method bool hasAudioDuration()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method $this setAudioUrl($string)
 * @method $this setTitle($string)
 * @method $this setCaption($string)
 * @method $this setPerformer($string)
 * @method $this setAudioDuration($integer)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this delAudioUrl()
 * @method $this delTitle()
 * @method $this delCaption()
 * @method $this delPerformer()
 * @method $this delAudioDuration()
 * @method $this delReplyMarkup()
 * @method $this delInputMessageContent()
 * @method string getAudioUrl($default = null)
 * @method string getTitle($default = null)
 * @method string getCaption($default = null)
 * @method string getPerformer($default = null)
 * @method int getAudioDuration($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultAudio
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultaudio
 */
class InlineQueryResultAudio extends InlineQueryResult
{
}