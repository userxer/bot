<?php namespace bot\object;

/**
 * This object represent a user's profile pictures.
 *
 * @method bool hasTotalCount()
 * @method bool hasPhotos()
 * @method int getTotalCount($default = null)
 * @method PhotoSize[][] getPhotos($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class UserProfilePhotos
 * @package bot\object
 * @link https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotos extends Object
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
            'photos' => PhotoSize::className()
        ];
    }
}