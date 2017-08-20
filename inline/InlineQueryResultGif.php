<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an animated GIF file. By default, this animated GIF file will
 * be sent by the user with optional caption. Alternatively, you can use input_message_content
 * to send a message with the specified content instead of the animation.
 *
 * @method bool hasGifUrl()
 * @method bool hasGifWidth()
 * @method bool hasGifHeight()
 * @method bool hasThumbUrl()
 * @method bool hasTitle()
 * @method bool hasCaption()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method $this setGifUrl($string)
 * @method $this setGifWidth($integer)
 * @method $this setGifHeight($integer)
 * @method $this setThumbUrl($string)
 * @method $this setTitle($string)
 * @method $this setCaption($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this delGifUrl()
 * @method $this delGifWidth()
 * @method $this delGifHeight()
 * @method $this delThumbUrl()
 * @method $this delTitle()
 * @method $this delCaption()
 * @method $this delReplyMarkup()
 * @method $this delInputMessageContent()
 * @method string getGifUrl($default = null)
 * @method int getGifWidth($default = null)
 * @method int getGifHeight($default = null)
 * @method string getThumbUrl($default = null)
 * @method string getTitle($default = null)
 * @method string getCaption($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultGif
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultgif
 */
class InlineQueryResultGif extends InlineQueryResult
{
}