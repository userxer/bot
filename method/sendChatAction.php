<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;

/**
 * Use this method when you need to tell the user that something is happening on the bot's side.
 * The status is set for 5 seconds or less (when a message arrives from your bot,
 * Telegram clients clear its typing status).
 * Returns True on success.
 *
 * Example:
 * The ImageBot needs some time to process a request and upload the image.
 * Instead of sending a text message along the lines of “Retrieving image, please wait…”,
 * the bot may use sendChatAction with action = upload_photo.
 * The user will see a “sending photo” status for the bot.
 *
 * We only recommend using this method when a response from the bot will
 * take a noticeable amount of time to arrive.
 *
 * @method Message|Error send()
 * @method bool hasChatId()
 * @method bool hasAction()
 * @method $this setChatId($integer)
 * @method $this setAction($string)
 * @method $this remChatId()
 * @method $this remAction()
 * @method string|int getChatId($default = null)
 * @method string getAction($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class sendChatAction
 * @package bot\method
 * @link https://core.telegram.org/bots/api#sendchataction
 */
class sendChatAction extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return true;
    }
}