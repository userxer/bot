<?php namespace bot\object;

/**
 * This object represents a chat photo.
 *
 * @method bool hasSmallFileId()
 * @method bool hasBigFileId()
 * @method bool getSmallFileId($default = null)
 * @method bool getBigFileId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class ChatPhoto
 * @package bot\object
 * @link https://core.telegram.org/bots/api#chatphoto
 */
class ChatPhoto extends Object
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