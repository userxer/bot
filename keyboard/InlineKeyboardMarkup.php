<?php namespace bot\keyboard;

use bot\keyboard\button\InlineKeyboardButton;

/**
 * This object represents an inline keyboard that appears right next
 * to the message it belongs to.
 *
 * Note:
 * This will only work in Telegram versions released after 9 April, 2016.
 * Older clients will display unsupported message.
 *
 * @method bool hasInlineKeyboard()
 * @method $this setInlineKeyboard($array)
 * @method $this remInlineKeyboard()
 * @method array getInlineKeyboard($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineKeyboardMarkup
 * @package bot\keyboard
 * @link https://core.telegram.org/bots/api#inlinekeyboardmarkup
 */
class InlineKeyboardMarkup extends Keyboard
{

    /**
     * InlineKeyboardMarkup constructor.
     * @param array $inlineKeyboard
     */
    public function __construct(array $inlineKeyboard = [])
    {
        $this->__set('inline_keyboard', $inlineKeyboard);
        parent::__construct();
    }

    /**
     * Add button to the keyboard, button must be InlineKeyboardButton,
     * and row, column is numbers.
     *
     * @param InlineKeyboardButton $button
     * @param int $row is y position
     * @param int $column is x position
     * @return $this
     */
    public function addButton(InlineKeyboardButton $button, $row = null, $column = null)
    {
        $index = 0;
        $keyboard = [];

        if ($this->__isset('inline_keyboard')) {
            $keyboard = $this->__get('inline_keyboard');
            $index = sizeof($keyboard) > 0 ? sizeof($keyboard) - 1 : 0;

            if (is_int($row)) $index = $row > 0 ? $row - 1 : 0;
            else $index++;
        }

        if (is_int($column)) {
            $keyboard[$index][$column] = $button;
        }
        else {
            $keyboard[$index][] = $button;
        }

        $this->__set('inline_keyboard', $keyboard);
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
        if ($this->__isset('inline_keyboard')) {
            $keyboard = $this->__get('inline_keyboard');

            if (is_int($row)) {
                if (is_int($column)) unset($keyboard[$row][$column]);
                else unset($keyboard[$row]);
            }
            else $keyboard = [];

            $this->__set('inline_keyboard', $keyboard);
        }

        return $this;
    }
}
