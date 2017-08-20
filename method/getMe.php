<?php namespace bot\method;

use bot\object\User;
use bot\object\Error;

/**
 * A simple method for testing your bot's auth token. Requires no parameters.
 * Returns basic information about the bot in form of a User object.
 *
 * @method User|Error send()
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getMe
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getme
 */
class getMe extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return User::className();
    }
}