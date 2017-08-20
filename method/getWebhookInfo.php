<?php namespace bot\method;

use bot\object\Error;
use bot\object\WebhookInfo;

/**
 * Use this method to get current webhook status. Requires no parameters.
 * On success, returns a WebhookInfo object. If the bot is using getUpdates,
 * will return an object with the url field empty.
 *
 * @method WebhookInfo|Error send()
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getWebhookInfo
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getwebhookinfo
 */
class getWebhookInfo extends Method
{

    /**
     * every methods have a response.
     * @return string the name of response class
     */
    protected function response()
    {
        return WebhookInfo::className();
    }
}