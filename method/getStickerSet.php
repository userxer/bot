<?php namespace bot\method;

use bot\object\Error;
use bot\object\StickerSet;

/**
 * Use this method to get a sticker set.
 * On success, a StickerSet object is returned.
 *
 * @method StickerSet|Error send()
 * @method bool hasName()
 * @method $this setName($string)
 * @method $this delName()
 * @method string getName($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getStickerSet
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getstickerset
 */
class getStickerSet extends Method
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