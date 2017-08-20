<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to delete a message,
 * including service messages, with the following limitations:
 * - A message can only be deleted if it was sent less than 48 hours ago.
 * - Bots can delete outgoing messages in groups and supergroups.
 * - Bots granted can_post_messages permissions can delete outgoing messages in channels.
 * - If the bot is an administrator of a group, it can delete any message there.
 * - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.
 * Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method bool hasMessageId()
 * @method $this setChatId($integer)
 * @method $this setMessageId($integer)
 * @method $this delChatId()
 * @method $this delMessageId()
 * @method string|int getChatId($default = null)
 * @method int getMessageId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class deleteMessage
 * @package bot\method
 * @link https://core.telegram.org/bots/api#deletemessage
 *
 */
class deleteMessage extends Method
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