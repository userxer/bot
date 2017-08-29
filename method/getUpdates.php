<?php namespace bot\method;

use bot\object\Error;
use bot\object\Update;

/**
 * Use this method to receive incoming updates using long polling (wiki).
 * An Array of Update objects is returned.
 *
 * Notes
 * 1. This method will not work if an outgoing webhook is set up.
 * 2. In order to avoid getting duplicate updates, recalculate
 *    offset after each server response.
 *
 * @method Update[]|Error send()
 * @method bool hasOffset()
 * @method bool hasLimit()
 * @method bool hasTimeout()
 * @method bool hasAllowedUpdates()
 * @method $this setOffset($integer)
 * @method $this setLimit($integer)
 * @method $this setTimeout($integer)
 * @method $this setAllowedUpdates($array)
 * @method $this remOffset()
 * @method $this remLimit()
 * @method $this remTimeout()
 * @method $this remAllowedUpdates()
 * @method int getOffset($default = null)
 * @method int getLimit($default = null)
 * @method int getTimeout($default = null)
 * @method array getAllowedUpdates($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getUpdates
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getupdates
 */
class getUpdates extends Method
{
    
    /**
     * every methods have a response.
     * @return string the name of response class
     */
    protected function response()
    {
        return Update::className();
    }
}