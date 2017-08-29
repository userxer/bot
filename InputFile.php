<?php namespace bot;

/**
 * This object represents the contents of a file to be
 * uploaded. Must be posted using multipart/form-data in
 * the usual way that files are uploaded
 * via the browser.
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InputFile
 * @package bot
 * @link https://core.telegram.org/bots/api#inputfile
 */
class InputFile extends \CURLFile
{
    
    /**
     * InputFile constructor.
     * @param string $filename path to the file which will be uploaded.
     * @param string|null $mimetype mimetype of the file.
     * @param string|null $postname name of the file.
     */
    public function __construct($filename, $mimetype = null, $postname = null)
    {
        $path = \Yii::getAlias($filename);
        parent::__construct($path, $mimetype, $postname);
    }
}
