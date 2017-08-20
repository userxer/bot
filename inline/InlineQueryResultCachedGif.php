<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an animated GIF file stored on the Telegram servers.
 * By default, this animated GIF file will be sent by the user with an optional caption.
 * Alternatively, you can use input_message_content to send a message with
 * specified content instead of the animation.
 *
 * @method bool hasGifFileId()
 * @method bool hasTitle()
 * @method bool hasCaption()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method $this setGifFileId($string)
 * @method $this setTitle($string)
 * @method $this setCaption($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this delGifFileId()
 * @method $this delTitle()
 * @method $this delCaption()
 * @method $this delReplyMarkup()
 * @method $this delInputMessageContent()
 * @method string getGifFileId($default = null)
 * @method string getTitle($default = null)
 * @method string getCaption($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultCachedGif
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultcachedgif
 */
class InlineQueryResultCachedGif extends InlineQueryResult
{
}