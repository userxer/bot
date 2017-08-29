<?php namespace bot\method;

use bot\object\Error;
use bot\object\GameHighScore;

/**
 * Use this method to get data for high score tables.
 * Will return the score of the specified user and several of his neighbors in a game.
 * On success, returns an Array of GameHighScore objects.
 *
 * This method will currently return scores for the target user,
 * plus two of his closest neighbors on each side.
 * Will also return the top three users if the user and his neighbors are not among them.
 * Please note that this behavior is subject to change.
 *
 * @method GameHighScore[]|Error send()
 * @method bool hasUserId($integer)
 * @method bool hasChatId($integer)
 * @method bool hasMessageId($integer)
 * @method bool hasInlineMessageId($string)
 * @method $this setUserId()
 * @method $this setChatId()
 * @method $this setMessageId()
 * @method $this setInlineMessageId()
 * @method $this remUserId()
 * @method $this remChatId()
 * @method $this remMessageId()
 * @method $this remInlineMessageId()
 * @method int getUserId($default = null)
 * @method int getChatId($default = null)
 * @method int getMessageId($default = null)
 * @method string getInlineMessageId($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class getGameHighScores
 * @package bot\method
 * @link https://core.telegram.org/bots/api#getgamehighscores
 */
class getGameHighScores extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return GameHighScore::className();
    }
}