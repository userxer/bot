<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a file stored on the Telegram servers. By default,
 * this file will be sent by the user with an optional caption. Alternatively,
 * you can use input_message_content to send a message with
 * the specified content instead of the file.
 *
 * Note:
 * This will only work in Telegram versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 * @method bool hasTitle()
 * @method bool hasDocumentFileId()
 * @method bool hasDescription()
 * @method bool hasCaption()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method $this setTitle($string)
 * @method $this setDocumentFileId($string)
 * @method $this setDescription($string)
 * @method $this setCaption($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this delTitle()
 * @method $this delDocumentFileId()
 * @method $this delDescription()
 * @method $this delCaption()
 * @method $this delReplyMarkup()
 * @method $this delInputMessageContent()
 * @method string getTitle($default = null)
 * @method string getDocumentFileId($default = null)
 * @method string getDescription($default = null)
 * @method string getCaption($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultCachedDocument
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 */
class InlineQueryResultCachedDocument extends InlineQueryResult
{
}