<?php namespace bot\method;

use bot\object\Error;
use bot\object\ChatMember;

/**
 * Use this method to get a list of administrators in a chat. On success,
 * returns an Array of ChatMember objects that contains information about all chat administrators except other bots.
 * If the chat is a group or a supergroup and no administrators were appointed,
 * only the creator will be returned.
 *
 *
 * @method ChatMember[]|Error send()
 * @method bool hasChatId()
 * @method $this setChatId($integer)
 * @method $this remChatId()
 * @method string|int getChatId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getChatAdministrators
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getchatadministrators
 */
class getChatAdministrators extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return ChatMember::className();
    }
}