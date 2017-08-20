<?php namespace bot\inline;

use bot\keyboard\InlineKeyboardMarkup;

/**
 * Represents a Game.
 *
 * Note:
 * This will only work in Telegram versions released after October 1, 2016.
 * Older clients will not display any inline results if a game result is among them.
 *
 * @method bool hasGameShortName()
 * @method bool hasReplyMarkup()
 * @method $this setGameShortName($string)
 * @method $this setReplyMarkup(InlineKeyboardMarkup $markup)
 * @method $this delGameShortName()
 * @method $this delReplyMarkup()
 * @method string getGameShortName($default = null)
 * @method InlineKeyboardMarkup getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class InlineQueryResultGame
 * @package bot\inline
 * @link https://core.telegram.org/bots/api#inlinequeryresultgame
 */
class InlineQueryResultGame extends InlineQueryResult
{
}