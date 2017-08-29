<?php namespace bot\method;

use bot\object\File;
use bot\object\Error;

/**
 * Use this method to get basic info about a file and prepare it for downloading.
 * For the moment, bots can download files of up to 20MB in size. On success,
 * a File object is returned.
 * The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>,
 * where <file_path> is taken from the response.
 * It is guaranteed that the link will be valid for at least 1 hour.
 * When the link expires, a new one can be requested by calling getFile again.
 *
 * Note:
 * This function may not preserve the original file name and MIME type.
 * You should save the file's MIME type and name (if available) when the File object is received.
 *
 * @method File|Error send()
 * @method bool hasFileId()
 * @method $this setFileId($string)
 * @method $this remFileId()
 * @method string getFileId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getFile
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getfile
 */
class getFile extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return File::className();
    }
}