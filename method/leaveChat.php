<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method for your bot to leave a group, supergroup or channel.
 * Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method $this setChatId($integer)
 * @method $this delChatId()
 * @method string|int getChatId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class leaveChat
 * @package bot\method
 * @link https://core.telegram.org/bots/api#leavechat
 *
 */
class leaveChat extends Method
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