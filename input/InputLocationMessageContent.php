<?php namespace bot\input;

/**
 * Represents the content of a location message to be sent as the result
 * of an inline query.
 *
 * Note:
 * This will only work in Telegram versions released after 9 April, 2016.
 * Older clients will ignore them.
 *
 * @method bool hasLatitude()
 * @method bool hasLongitude()
 * @method $this setLatitude($float)
 * @method $this setLongitude($float)
 * @method $this remLatitude()
 * @method $this remLongitude()
 * @method float getLatitude($default = null)
 * @method float getLongitude($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InputLocationMessageContent
 * @package bot\input
 * @link https://core.telegram.org/bots/api#inputlocationmessagecontent
 */
class InputLocationMessageContent extends InputMessageContent
{
}