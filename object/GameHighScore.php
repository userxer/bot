<?php namespace bot\object;

/**
 * This object represents one row of the high scores table for a game.
 *
 * @method bool hasPosition()
 * @method bool hasUser()
 * @method bool hasScore()
 * @method int getPosition($default = null)
 * @method User getUser($default = null)
 * @method int getScore($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class GameHighScore
 * @package bot\object
 * @link https://core.telegram.org/bots/api#gamehighscore
 */
class GameHighScore extends Object
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
            'user' => User::className()
        ];
    }
}