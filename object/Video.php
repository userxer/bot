<?php namespace bot\object;

/**
 * This object represents a video file.
 *
 * @method bool hasFileId()
 * @method bool hasWidth()
 * @method bool hasHeight()
 * @method bool hasDuration()
 * @method bool hasThumb()
 * @method bool hasMimeType()
 * @method bool hasFileSize()
 * @method string getFileId($default = null)
 * @method int getWidth($default = null)
 * @method int getHeight($default = null)
 * @method int getDuration($default = null)
 * @method PhotoSize getThumb($default = null)
 * @method string getMimeType($default = null)
 * @method int getFileSize($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Video
 * @package bot\object
 * @link https://core.telegram.org/bots/api#video
 */
class Video extends Object
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