<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a contact with a phone number. By default, this contact will be sent by the user.
 * Alternatively, you can use input_message_content to send a message with
 * the specified content instead of the contact.
 *
 * Note:
 * This will only work in Telegram versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 * @method bool hasPhoneNumber()
 * @method bool hasFirstName()
 * @method bool hasLastName()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method bool hasThumbUrl()
 * @method bool hasThumbWidth()
 * @method bool hasThumbHeight()
 * @method $this setPhoneNumber($string)
 * @method $this setFirstName($string)
 * @method $this setLastName($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this setThumbUrl($string)
 * @method $this setThumbWidth($integer)
 * @method $this setThumbHeight($integer)
 * @method $this delPhoneNumber()
 * @method $this delFirstName()
 * @method $this delLastName()
 * @method $this delReplyMarkup()
 * @method $this delInputMessageContent()
 * @method $this delThumbUrl()
 * @method $this delThumbWidth()
 * @method $this delThumbHeight()
 * @method string getPhoneNumber($default = null)
 * @method string getFirstName($default = null)
 * @method string getLastName($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 * @method string getThumbUrl($default = null)
 * @method int getThumbWidth($default = null)
 * @method int getThumbHeight($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultContact
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultcontact
 */
class InlineQueryResultContact extends InlineQueryResult
{
}