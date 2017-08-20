<?php namespace bot\object;

/**
 * A placeholder, currently holds no information.
 * Use BotFather to set up your game.
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class CallbackGame
 * @package bot\object
 * @link https://core.telegram.org/bots/api#callbackgame
 */
class CallbackGame extends Object
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