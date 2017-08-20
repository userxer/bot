<?php namespace bot\keyboard\button;

/**
 * This object represents one button of the reply keyboard.
 * For simple text buttons String can be used instead of this object to specify text of the button.
 * Optional fields are mutually exclusive.
 *
 * Note:
 * request_contact and request_location options will only work in Telegram
 * versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 * @method bool hasText()
 * @method bool hasRequestContact()
 * @method bool hasRequestLocation()
 * @method $this setText($string)
 * @method $this setRequestContact($boolean)
 * @method $this setRequestLocation($boolean)
 * @method $this delText()
 * @method $this delRequestContact()
 * @method $this delRequestLocation()
 * @method string getText($default = null)
 * @method bool getRequestContact($default = null)
 * @method bool getRequestLocation($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class KeyboardButton
 * @package bot\keyboard\button
 * @link https://core.telegram.org/bots/api#keyboardbutton
 */
class KeyboardButton extends Button
{

    /**
     * KeyboardButton constructor.
     * @param array|string $properties
     */
    public function __construct($properties = [])
    {
        if (is_string($properties)) {
            $this->__set('text', $properties);
            $properties = [];
        }

        parent::__construct($properties);
    }
}
