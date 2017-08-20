<?php namespace bot\object;

/**
 * This object represents an incoming callback query from a callback button in an inline keyboard.
 * If the button that originated the query was attached to a message sent by the bot, the field message
 * will be present. If the button was attached to a message sent via the bot (in inline mode),
 * the field inline_message_id will be present. Exactly one of the fields data
 * or game_short_name will be present.
 *
 * NOTE:
 * After the user presses an inline button, Telegram clients will display a progress bar until
 * you call answerCallbackQuery. It is, therefore, necessary to react by calling answerCallbackQuery
 * even if no notification to the user is needed (e.g., without specifying any of the optional parameters).
 *
 * @method bool hasId()
 * @method bool hasFrom()
 * @method bool hasMessage()
 * @method bool hasInlineMessageId()
 * @method bool hasChatInstance()
 * @method bool hasData()
 * @method bool hasGameShortName()
 * @method string getId($default = null)
 * @method User getFrom($default = null)
 * @method Message getMessage($default = null)
 * @method string getInlineMessageId($default = null)
 * @method string getChatInstance($default = null)
 * @method string getData($default = null)
 * @method string getGameShortName($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class CallbackQuery
 * @package bot\object
 * @link https://core.telegram.org/bots/api#callbackquery
 */
class CallbackQuery extends Object
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
            'message' => Message::className()
        ];
    }
}