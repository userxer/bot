<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to move a sticker in a set created by
 * the bot to a specific position.
 * Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasSticker()
 * @method bool hasPosition()
 * @method $this setSticker($string)
 * @method $this setPosition($integer)
 * @method $this remSticker()
 * @method $this remPosition()
 * @method string getSticker($default = null)
 * @method int getPosition($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class setStickerPositionInSet
 * @package bot\method
 * @link https://core.telegram.org/bots/api#setstickerpositioninset
 */
class setStickerPositionInSet extends Method
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