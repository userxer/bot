<?php namespace bot\object;

/**
 * This object represents one size of a photo or a file / sticker thumbnail.
 *
 * @method bool hasFileId()
 * @method bool hasWidth()
 * @method bool hasHeight()
 * @method bool hasFileSize()
 * @method string getFileId($default = null)
 * @method int getWidth($default = null)
 * @method int getHeight($default = null)
 * @method int getFileSize($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class PhotoSize
 * @package bot\object
 * @link https://core.telegram.org/bots/api#photosize
 */
class PhotoSize extends Object
{

    /**
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    protected function relations()
    {
        return [];
    }
}