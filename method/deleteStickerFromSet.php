<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to delete a sticker from a set created by the bot.
 * Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasSticker()
 * @method $this setSticker($string)
 * @method $this remSticker()
 * @method string getSticker($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class deleteStickerFromSet
 * @package bot\method
 * @link https://core.telegram.org/bots/api#deletestickerfromset
 */
class deleteStickerFromSet extends Method
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