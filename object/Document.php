<?php namespace bot\object;

/**
 * This object represents a general file (as opposed to photos, voice messages and audio files).
 *
 * @method bool hasFileId()
 * @method bool hasThumb()
 * @method bool hasFileName()
 * @method bool hasMimeType()
 * @method bool hasFileSize()
 * @method string getFileId($default = null)
 * @method PhotoSize getThumb($default = null)
 * @method string getFileName($default = null)
 * @method string getMimeType($default = null)
 * @method int getFileSize($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Document
 * @package bot\object
 * @link https://core.telegram.org/bots/api#document
 */
class Document extends Object
{

    /**
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    protected function relations()
    {
        return [
            'thumb' => PhotoSize::className()
        ];
    }
}