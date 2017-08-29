<?php namespace bot\method;

use bot\InputFile;
use bot\object\Error;

/**
 * Use this method to specify a url and receive incoming updates via an outgoing webhook.
 * Whenever there is an update for the bot, we will send an HTTPS POST request to the
 * specified url, containing a JSON-serialized Update. In case of an unsuccessful request,
 * we will give up after a reasonable amount of attempts.
 * Returns true.
 *
 * If you'd like to make sure that the Webhook request comes from Telegram,
 * we recommend using a secret path in the URL, e.g.
 * https://www.example.com/<token>. Since nobody else knows your bot‘s token,
 * you can be pretty sure it’s us.
 *
 * Notes
 * 1. You will not be able to receive updates using getUpdates for as long
 *    as an outgoing webhook is set up.
 * 2. To use a self-signed certificate, you need to upload your public key certificate
 *    using certificate parameter. Please upload as InputFile, sending a String will not work.
 * 3. Ports currently supported for Webhooks: 443, 80, 88, 8443.
 *
 * NEW! If you're having any trouble setting up webhooks,
 * please check out this amazing guide to Webhooks.
 *
 * @method true|Error send()
 * @method bool hasUrl()
 * @method bool hasCertificate()
 * @method bool hasMaxConnections()
 * @method bool hasAllowedUpdates()
 * @method $this setUrl($string)
 * @method $this setCertificate(InputFile $file)
 * @method $this setMaxConnections($integer)
 * @method $this setAllowedUpdates($array)
 * @method $this remUrl()
 * @method $this remCertificate()
 * @method $this remMaxConnections()
 * @method $this remAllowedUpdates()
 * @method string getUrl($default = null)
 * @method InputFile getCertificate($default = null)
 * @method int getMaxConnections($default = null)
 * @method array getAllowedUpdates($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class setWebhook
 * @package bot\method
 * @link https://core.telegram.org/bots/api#setwebhook
 */
class setWebhook extends Method
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