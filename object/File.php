<?php namespace bot\object;

/**
 * This object represents a file ready to be downloaded. The file can be downloaded via the
 * link https://api.telegram.org/file/bot<token>/<file_path>. It is guaranteed that the link
 * will be valid for at least 1 hour. When the link expires,
 * a new one can be requested by calling getFile.
 *
 * Info:
 * Maximum file size to download is 20 MB
 *
 * @method bool hasFileId()
 * @method bool hasFileSize()
 * @method bool hasFilePath()
 * @method string getFileId($default = null)
 * @method int getFileSize($default = null)
 * @method string getFilePath($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class File
 * @package bot\object
 * @link https://core.telegram.org/bots/api#file
 */
class File extends Object
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