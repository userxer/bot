<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to an article or web page.
 *
 * @method bool hasTitle()
 * @method bool hasInputMessageContent()
 * @method bool hasReplyMarkup()
 * @method bool hasUrl()
 * @method bool hasHideUrl()
 * @method bool hasDescription()
 * @method bool hasThumbUrl()
 * @method bool hasThumbWidth()
 * @method bool hasThumbHeight()
 * @method $this setTitle($string)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setUrl($string)
 * @method $this setHideUrl($boolean)
 * @method $this setDescription($string)
 * @method $this setThumbUrl($string)
 * @method $this setThumbWidth($integer)
 * @method $this setThumbHeight($integer)
 * @method $this delTitle()
 * @method $this delInputMessageContent()
 * @method $this delReplyMarkup()
 * @method $this delUrl()
 * @method $this delHideUrl()
 * @method $this delDescription()
 * @method $this delThumbUrl()
 * @method $this delThumbWidth()
 * @method $this delThumbHeight()
 * @method string getTitle($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method string getUrl($default = null)
 * @method bool getHideUrl($default = null)
 * @method string getDescription($default = null)
 * @method string getThumbUrl($default = null)
 * @method int getThumbWidth($default = null)
 * @method int getThumbHeight($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultArticle
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultarticle
 */
class InlineQueryResultArticle extends InlineQueryResult
{
}