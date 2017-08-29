<?php namespace bot\method;

use bot\InputFile;
use bot\object\Error;
use bot\object\MaskPosition;

/**
 * Use this method to create new sticker set owned by a user.
 * The bot will be able to edit the created sticker set.
 * Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasCacheTime()
 * @method bool hasUserId()
 * @method bool hasName()
 * @method bool hasTitle()
 * @method bool hasPngSticker()
 * @method bool hasEmojis()
 * @method bool hasContainsMasks()
 * @method bool hasMaskPosition()
 * @method $this setCacheTime($integer)
 * @method $this setUserId($integer)
 * @method $this setName($string)
 * @method $this setTitle($string)
 * @method $this setPngSticker($file)
 * @method $this setEmojis($string)
 * @method $this setContainsMasks($boolean)
 * @method $this setMaskPosition($mask)
 * @method $this remCacheTime()
 * @method $this remUserId()
 * @method $this remName()
 * @method $this remTitle()
 * @method $this remPngSticker()
 * @method $this remEmojis()
 * @method $this remContainsMasks()
 * @method $this remMaskPosition()
 * @method int getCacheTime($default = null)
 * @method int getUserId($default = null)
 * @method string getName($default = null)
 * @method string getTitle($default = null)
 * @method string getPngSticker($default = null)
 * @method string|InputFile getEmojis($default = null)
 * @method bool getContainsMasks($default = null)
 * @method MaskPosition getMaskPosition($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class createNewStickerSet
 * @package bot\method
 * @link https://core.telegram.org/bots/api#createnewstickerset
 */
class createNewStickerSet extends Method
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