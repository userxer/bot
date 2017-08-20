<?php namespace bot\method;

use bot\object\Error;
use bot\inline\InlineQueryResult;

/**
 * Use this method to send answers to an inline query.
 * On success, True is returned. No more than 50 results
 * per query are allowed.
 *
 * @method true|Error send()
 * @method bool hasInlineQueryId()
 * @method bool hasResults()
 * @method bool hasCacheTime()
 * @method bool hasIsPersonal()
 * @method bool hasNextOffset()
 * @method bool hasSwitchPmText()
 * @method bool hasSwitchPmParameter()
 * @method $this setInlineQueryId($string)
 * @method $this setResults($array)
 * @method $this setCacheTime($integer)
 * @method $this setIsPersonal($boolean)
 * @method $this setNextOffset($string)
 * @method $this setSwitchPmText($string)
 * @method $this setSwitchPmParameter($string)
 * @method $this delInlineQueryId()
 * @method $this delResults()
 * @method $this delCacheTime()
 * @method $this delIsPersonal()
 * @method $this delNextOffset()
 * @method $this delSwitchPmText()
 * @method $this delSwitchPmParameter()
 * @method string getInlineQueryId()
 * @method array|InlineQueryResult[] getResults()
 * @method int getCacheTime()
 * @method bool getIsPersonal()
 * @method string getNextOffset()
 * @method string getSwitchPmText()
 * @method string getSwitchPmParameter()
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class answerInlineQuery
 * @package bot\method
 * @link https://core.telegram.org/bots/api#answerinlinequery
 */
class answerInlineQuery extends Method
{

    /**
     * every methods have a response.
     * @return string the name of response class
     */
    protected function response()
    {
        return true;
    }
}