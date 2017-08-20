<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a location on a map. By default, the location will be sent by the user.
 * Alternatively, you can use input_message_content to send a message with the specified
 * content instead of the location.
 *
 * Note:
 * This will only work in Telegram versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 * @method bool hasLatitude()
 * @method bool hasLongitude()
 * @method bool hasTitle()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method bool hasThumbUrl()
 * @method bool hasThumbWidth()
 * @method bool hasThumbHeight()
 * @method $this setLatitude($float)
 * @method $this setLongitude($float)
 * @method $this setTitle($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this setThumbUrl($string)
 * @method $this setThumbWidth($integer)
 * @method $this setThumbHeight($integer)
 * @method $this delLatitude()
 * @method $this delLongitude()
 * @method $this delTitle()
 * @method $this delReplyMarkup()
 * @method $this delInputMessageContent()
 * @method $this delThumbUrl()
 * @method $this delThumbWidth()
 * @method $this delThumbHeight()
 * @method float getLatitude($default = null)
 * @method float getLongitude($default = null)
 * @method string getTitle($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 * @method string getThumbUrl($default = null)
 * @method int getThumbWidth($default = null)
 * @method int getThumbHeight($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultLocation
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultlocation
 */
class InlineQueryResultLocation extends InlineQueryResult
{
}