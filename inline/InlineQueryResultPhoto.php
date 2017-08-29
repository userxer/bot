<?php namespace bot\inline;

use bot\input\InputMessageContent;
use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a link to a photo. By default, this photo will be sent by the user with
 * optional caption. Alternatively, you can use input_message_content to send a message with
 * the specified content instead of the photo.
 *
 * @method bool hasPhotoUrl()
 * @method bool hasThumbUrl()
 * @method bool hasPhotoWidth()
 * @method bool hasPhotoHeight()
 * @method bool hasTitle()
 * @method bool hasDescription()
 * @method bool hasCaption()
 * @method bool hasReplyMarkup()
 * @method bool hasInputMessageContent()
 * @method $this setPhotoUrl($string)
 * @method $this setThumbUrl($string)
 * @method $this setPhotoWidth($integer)
 * @method $this setPhotoHeight($integer)
 * @method $this setTitle($string)
 * @method $this setDescription($string)
 * @method $this setCaption($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this setInputMessageContent(InputMessageContent $input)
 * @method $this remPhotoUrl()
 * @method $this remThumbUrl()
 * @method $this remPhotoWidth()
 * @method $this remPhotoHeight()
 * @method $this remTitle()
 * @method $this remDescription()
 * @method $this remCaption()
 * @method $this remReplyMarkup()
 * @method $this remInputMessageContent()
 * @method string getPhotoUrl($default = null)
 * @method string getThumbUrl($default = null)
 * @method int getPhotoWidth($default = null)
 * @method int getPhotoHeight($default = null)
 * @method string getTitle($default = null)
 * @method string getDescription($default = null)
 * @method string getCaption($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 * @method InputMessageContent getInputMessageContent($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultPhoto
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultphoto
 */
class InlineQueryResultPhoto extends InlineQueryResult
{
}