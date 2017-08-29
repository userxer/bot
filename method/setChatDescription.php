<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to change the description of a supergroup or a channel.
 * The bot must be an administrator in the chat for this to work and must
 * have the appropriate admin rights.
 * Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method bool hasDescription()
 * @method $this setChatId($integer)
 * @method $this setDescription($string)
 * @method $this remChatId()
 * @method $this remDescription()
 * @method string|int getChatId($default = null)
 * @method string getDescription($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class setChatDescription
 * @package bot\method
 * @link https://core.telegram.org/bots/api#setchatdescription
 */
class setChatDescription extends Method
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