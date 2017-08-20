<?php namespace bot\object;

/**
 * This object represents a venue.
 *
 * @method bool hasLocation()
 * @method bool hasTitle()
 * @method bool hasAddress()
 * @method bool hasFoursquareId()
 * @method Location getLocation($default = null)
 * @method string getTitle($default = null)
 * @method string getAddress($default = null)
 * @method string getFoursquareId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Venue
 * @package bot\object
 * @link https://core.telegram.org/bots/api#venue
 */
class Venue extends Object
{

    /**
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    protected function relations()
    {
        return [
            'location' => Location::className()
        ];
    }
}