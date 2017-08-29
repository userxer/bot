<?php namespace bot\keyboard;

/**
 * Upon receiving a message with this object, Telegram clients will remove the current
 * custom keyboard and display the default letter-keyboard. By default, custom keyboards 
 * are displayed until a new keyboard is sent by a bot. An exception is made for one-time 
 * keyboards that are hidden immediately after the user 
 * presses a button (see ReplyKeyboardMarkup).
 *
 * @method bool hasRemoveKeyboard()
 * @method bool hasSelective()
 * @method $this setRemoveKeyboard($true)
 * @method $this setSelective($boolean)
 * @method $this remRemoveKeyboard()
 * @method $this remSelective()
 * @method true getRemoveKeyboard($default = null)
 * @method bool getSelective($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 * 
 * Class ReplyKeyboardRemove
 * @package bot\keyboard
 * @link https://core.telegram.org/bots/api#replykeyboardremove
 */
class ReplyKeyboardRemove extends Keyboard
{

    /**
     * ReplyKeyboardRemove constructor.
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        $this->__set('remove_keyboard', true);
        parent::__construct($properties);
    }
}
