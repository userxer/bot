<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound).
 * By default, this animated MPEG-4 file will be sent by the user with optional caption.
 * Alternatively, you can use input_message_content to send a message with the
 * specified content instead of the animation.
 *
 * @method bool hasMpeg4Url()
 * @method bool hasMpeg4Width()
 * @method bool hasMpeg4Height()
 * @method bool hasThumbUrl()
 * @method bool hasTitle()
 * @method bool hasCaption()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method $this setMpeg4Url($string)
 * @method $this setMpeg4Width($integer)
 * @method $this setMpeg4Height($integer)
 * @method $this setThumbUrl($string)
 * @method $this setTitle($string)
 * @method $this setCaption($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this delMpeg4Url()
 * @method $this delMpeg4Width()
 * @method $this delMpeg4Height()
 * @method $this delThumbUrl()
 * @method $this delTitle()
 * @method $this delCaption()
 * @method $this delReplyMarkup()
 * @method $this delInputMessageContent()
 * @method string getMpeg4Url($default = null)
 * @method int getMpeg4Width($default = null)
 * @method int getMpeg4Height($default = null)
 * @method string getThumbUrl($default = null)
 * @method string getTitle($default = null)
 * @method string getCaption($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultMpeg4Gif
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 */
class InlineQueryResultMpeg4Gif extends InlineQueryResult
{
}