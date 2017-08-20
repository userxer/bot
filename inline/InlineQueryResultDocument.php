<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a file. By default, this file will be sent by the user with an optional caption.
 * Alternatively, you can use input_message_content to send a message with the specified content instead of the file.
 * Currently, only .PDF and .ZIP files can be sent using this method.
 *
 * Note:
 * This will only work in Telegram versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 * @method bool hasTitle()
 * @method bool hasCaption()
 * @method bool hasDocumentUrl()
 * @method bool hasMimeType()
 * @method bool hasDescription()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method bool hasThumbUrl()
 * @method bool hasThumbWidth()
 * @method bool hasThumbHeight()
 * @method $this setTitle($string)
 * @method $this setCaption($string)
 * @method $this setDocumentUrl($string)
 * @method $this setMimeType($string)
 * @method $this setDescription($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this setThumbUrl($string)
 * @method $this setThumbWidth($integer)
 * @method $this setThumbHeight($integer)
 * @method $this delTitle()
 * @method $this delCaption()
 * @method $this delDocumentUrl()
 * @method $this delMimeType()
 * @method $this delDescription()
 * @method $this delReplyMarkup()
 * @method $this delInputMessageContent()
 * @method $this delThumbUrl()
 * @method $this delThumbWidth()
 * @method $this delThumbHeight()
 * @method string getTitle($default = null)
 * @method string getCaption($default = null)
 * @method string getDocumentUrl($default = null)
 * @method string getMimeType($default = null)
 * @method string getDescription($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 * @method string getThumbUrl($default = null)
 * @method int getThumbWidth($default = null)
 * @method int getThumbHeight($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultDocument
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultdocument
 */
class InlineQueryResultDocument extends InlineQueryResult
{
}