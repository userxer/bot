<?php namespace bot\keyboard;

/**
 * Upon receiving a message with this object, Telegram clients will display a reply
 * interface to the user (act as if the user has selected the bot‘s message and tapped ’Reply').
 * This can be extremely useful if you want to create user-friendly step-by-step interfaces
 * without having to sacrifice privacy mode.
 *
 * Example:
 * A poll bot for groups runs in privacy mode (only receives commands, replies to its messages and mentions).
 * There could be two ways to create a new poll:
 *
 * @method bool hasForceReply()
 * @method bool hasSelective()
 * @method $this setForceReply($bool)
 * @method $this setSelective($bool)
 * @method $this remForceReply()
 * @method $this remSelective()
 * @method True getForceReply($default = null)
 * @method bool getSelective($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class ForceReply
 * @package bot\keyboard
 * @link https://core.telegram.org/bots/api#forcereply
 */
class ForceReply extends Keyboard
{

    /**
     * ForceReply constructor.
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        $this->__set('force_reply', true);
        parent::__construct($properties);
    }
}
