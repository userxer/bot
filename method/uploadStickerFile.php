<?php namespace bot\method;

use bot\InputFile;
use bot\object\Error;

/**
 * Use this method to upload a .png file with a sticker for later use in
 * createNewStickerSet and addStickerToSet methods (can be used multiple times).
 * Returns the uploaded File on success.
 *
 * @method true|Error send()
 * @method bool hasUserId()
 * @method bool hasPngSticker()
 * @method $this setUserId($integer)
 * @method $this setPngSticker($file)
 * @method $this remUserId()
 * @method $this remPngSticker()
 * @method int getUserId($default = null)
 * @method InputFile getPngSticker($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class uploadStickerFile
 * @package bot\method
 * @link https://core.telegram.org/bots/api#uploadstickerfile
 */
class uploadStickerFile extends Method
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