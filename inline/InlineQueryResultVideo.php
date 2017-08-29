<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a page containing an embedded video player or a video file.
 * By default, this video file will be sent by the user with an optional caption.
 * Alternatively, you can use input_message_content to send a message with the
 * specified content instead of the video.
 *
 * Note:
 * This will only work in Telegram versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 * @method bool hasVideoUrl()
 * @method bool hasMimeType()
 * @method bool hasThumbUrl()
 * @method bool hasTitle()
 * @method bool hasCaption()
 * @method bool hasVideoWidth()
 * @method bool hasVideoHeight()
 * @method bool hasVideoDuration()
 * @method bool hasDescription()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method $this setVideoUrl($string)
 * @method $this setMimeType($string)
 * @method $this setThumbUrl($string)
 * @method $this setTitle($string)
 * @method $this setCaption($string)
 * @method $this setVideoWidth($integer)
 * @method $this setVideoHeight($integer)
 * @method $this setVideoDuration($integer)
 * @method $this setDescription($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this remVideoUrl()
 * @method $this remMimeType()
 * @method $this remThumbUrl()
 * @method $this remTitle()
 * @method $this remCaption()
 * @method $this remVideoWidth()
 * @method $this remVideoHeight()
 * @method $this remVideoDuration()
 * @method $this remDescription()
 * @method $this remReplyMarkup()
 * @method $this remInputMessageContent()
 * @method string getVideoUrl($default = null)
 * @method string getMimeType($default = null)
 * @method string getThumbUrl($default = null)
 * @method string getTitle($default = null)
 * @method string getCaption($default = null)
 * @method int getVideoWidth($default = null)
 * @method int getVideoHeight($default = null)
 * @method int getVideoDuration($default = null)
 * @method string getDescription($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultVideo
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultvideo
 */
class InlineQueryResultVideo extends InlineQueryResult
{
}