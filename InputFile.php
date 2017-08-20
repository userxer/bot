<?php namespace bot;

/**
 * This object represents the contents of a file to be uploaded. Must be posted using
 * multipart/form-data in the usual way that files are uploaded via the browser.
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
     * @param string $filename
     * @param string|null $mimetype
     * @param string|null $postname
     */
    public function __construct($filename, $mimetype = null, $postname = null)
    {
        $path = \Yii::getAlias($filename, false);
        parent::__construct($path, $mimetype, $postname);
    }
}
