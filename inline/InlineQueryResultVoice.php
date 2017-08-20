<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a voice recording in an .ogg container encoded with OPUS. By default,
 * this voice recording will be sent by the user. Alternatively, you can use input_message_content
 * to send a message with the specified content instead of the the voice message.
 *
 * Note:
 * This will only work in Telegram versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 * @method bool hasVoiceUrl()
 * @method bool hasTitle()
 * @method bool hasCaption()
 * @method bool hasVoiceDuration()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method $this setVoiceUrl($string)
 * @method $this setTitle($string)
 * @method $this setCaption($string)
 * @method $this setVoiceDuration($integer)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this delVoiceUrl()
 * @method $this delTitle()
 * @method $this delCaption()
 * @method $this delVoiceDuration()
 * @method $this delReplyMarkup()
 * @method $this delInputMessageContent()
 * @method string getVoiceUrl($default = null)
 * @method string getTitle($default = null)
 * @method string getCaption($default = null)
 * @method int getVoiceDuration($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultVoice
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultvoice
 */
class InlineQueryResultVoice extends InlineQueryResult
{
}