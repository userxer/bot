<?php namespace bot\method;

use bot\object\Error;
use bot\object\UserProfilePhotos;

/**
 * Use this method to get a list of profile pictures for a user.
 * Returns a UserProfilePhotos object.
 *
 * @method UserProfilePhotos|Error send()
 * @method bool hasUserId()
 * @method bool hasOffset()
 * @method bool hasLimit()
 * @method $this setUserId($integer)
 * @method $this setOffset($integer)
 * @method $this setLimit($integer)
 * @method $this delUserId()
 * @method $this delOffset()
 * @method $this delLimit()
 * @method int getUserId($default = null)
 * @method int getOffset($default = null)
 * @method int getLimit($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getUserProfilePhotos
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getuserprofilephotos
 */
class getUserProfilePhotos extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return UserProfilePhotos::className();
    }
}