<?php namespace bot\object;

/**
 * Contains information about why a request was unsuccessfull.
 *
 * @method bool hasMigrateToChatId()
 * @method bool hasRetryAfter()
 * @method int getMigrateToChatId($default = null)
 * @method int getRetryAfter($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class ResponseParameters
 * @package bot\object
 * @link https://core.telegram.org/bots/api#responseparameters
 */
class ResponseParameters extends Object
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