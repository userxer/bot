<?php namespace bot\object;

/**
 * This object represents a voice note.
 *
 * @method bool hasFileId()
 * @method bool hasDuration()
 * @method bool hasMimeType()
 * @method bool hasFileSize()
 * @method string getFileId($default = null)
 * @method int getDuration($default = null)
 * @method string getMimeType($default = null)
 * @method int getFileSize($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Voice
 * @package bot\object
 * @link https://core.telegram.org/bots/api#voice
 */
class Voice extends Object
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