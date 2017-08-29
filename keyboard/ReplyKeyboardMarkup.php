<?php namespace bot\keyboard;

use bot\keyboard\button\KeyboardButton;

/**
 * This object represents a custom keyboard with reply
 * options (see Introduction to bots for details and examples).
 *
 * @method bool hasKeyboard()
 * @method bool hasResizeKeyboard()
 * @method bool hasOneTimeKeyboard()
 * @method bool hasSelective()
 * @method $this setKeyboard($array)
 * @method $this setResizeKeyboard($boolean)
 * @method $this setOneTimeKeyboard($boolean)
 * @method $this setSelective($boolean)
 * @method $this remKeyboard()
 * @method $this remResizeKeyboard()
 * @method $this remOneTimeKeyboard()
 * @method $this remSelective()
 * @method array getKeyboard($default = null)
 * @method bool getResizeKeyboard($default = null)
 * @method bool getOneTimeKeyboard($default = null)
 * @method bool getSelective($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 * 
 * Class ReplyKeyboardMarkup
 * @package bot\keyboard
 * @link https://core.telegram.org/bots/api#replykeyboardmarkup
 */
class ReplyKeyboardMarkup extends Keyboard
{

    /**
     * ReplyKeyboardMarkup constructor.
     * @param array $properties
     */
    public function __construct(array $properties = [])
    {
        $this->__set('resize_keyboard', true);
        parent::__construct($properties);
    }

    /**
     * Add button to the keyboard, button must be InlineKeyboardButton,
     * and row, column is numbers.
     *
     * @param KeyboardButton $button
     * @param int $row is y position
     * @param int $column is x position
     * @return $this
     */
    public function addButton(KeyboardButton $button, $row = null, $column = null)
    {
        $index = 0;
        $keyboard = [];

        if ($this->__isset('keyboard')) {
            $keyboard = $this->__get('keyboard');
            $index = sizeof($keyboard) > 0 ? sizeof($keyboard) - 1 : 0;

            if (is_int($row)) $index = $row > 0 ? $row - 1 : 0;
            else $index++;
        }

        if (is_int($column)) $keyboard[$index][$column] = $button;
        else $keyboard[$index][] = $button;

        $this->__set('keyboard', $keyboard);
        return $this;
    }

    /**
     * Delete button for the keyboard.
     *
     * @param int $row is y position
     * @param int $column is x position
     * @return $this
     */
    public function deleteButton($row = null, $column = null)
    {
        if ($this->__isset('keyboard')) {
            $keyboard = $this->__get('keyboard');

            if (is_int($row)) {
                if (is_int($column)) unset($keyboard[$row][$column]);
                else unset($keyboard[$row]);
            }
            else $keyboard = [];

            $this->__set('keyboard', $keyboard);
        }

        return $this;
    }
}
