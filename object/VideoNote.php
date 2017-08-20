<?php namespace bot\object;

/**
 * This object represents a video message
 * (available in Telegram apps as of v.4.0).
 *
 * @method bool hasFileId()
 * @method bool hasLength()
 * @method bool hasDuration()
 * @method bool hasThumb()
 * @method bool hasFileSize()
 * @method string getFileId($default = null)
 * @method int getLength($default = null)
 * @method int getDuration($default = null)
 * @method PhotoSize getThumb($default = null)
 * @method int getFileSize($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class VideoNote
 * @package bot\object
 * @link https://core.telegram.org/bots/api#videonote
 */
class VideoNote extends Object
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