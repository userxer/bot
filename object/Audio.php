<?php namespace bot\object;

/**
 * This object represents an audio file to be treated as music by the Telegram clients.
 *
 * @method bool hasFileId()
 * @method bool hasDuration()
 * @method bool hasPerformer()
 * @method bool hasTitle()
 * @method bool hasMimeType()
 * @method bool hasFileSize()
 * @method string getFileId($default = null)
 * @method int getDuration($default = null)
 * @method string getPerformer($default = null)
 * @method string getTitle($default = null)
 * @method string getMimeType($default = null)
 * @method int getFileSize($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Audio
 * @package bot\object
 * @link https://core.telegram.org/bots/api#audio
 */
class Audio extends Object
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