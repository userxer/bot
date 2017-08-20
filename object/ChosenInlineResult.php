<?php namespace bot\object;

/**
 * Represents a result of an inline query that was chosen by
 * the user and sent to their chat partner.
 *
 * @method bool hasResultId()
 * @method bool hasFrom()
 * @method bool hasLocation()
 * @method bool hasInlineMessageId()
 * @method bool hasQuery()
 * @method string getResultId($default = null)
 * @method User getFrom($default = null)
 * @method Location getLocation($default = null)
 * @method string getInlineMessageId($default = null)
 * @method string getQuery($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class ChosenInlineResult
 * @package bot\object
 * @link https://core.telegram.org/bots/api#choseninlineresult
 */
class ChosenInlineResult extends Object
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
            'from' => User::className(),
            'location' => Location::className()
        ];
    }
}