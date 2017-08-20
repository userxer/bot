<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to remove webhook integration if you decide to switch
 * back to getUpdates. Returns True on success.
 * Requires no parameters.
 *
 * @method true|Error send()
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class deleteWebhook
 * @package bot\method
 * @link https://core.telegram.org/bots/api#deletewebhook
 */
class deleteWebhook extends Method
{

    /**
     * every methods have a response.
     * @return string the name of response class
     */
    protected function response()
    {
        return true;
    }
}