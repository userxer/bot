<?php namespace bot\base;

use yii\base\Object;
use bot\object\Chat;
use bot\object\User;
use bot\helper\Token;
use yii\helpers\Json;
use bot\object\Update;
use bot\helper\Callback;
use bot\helper\Comparator;

/**
 * Bots are third-party applications that run inside Telegram.
 * Users can interact with bots by sending them messages, commands and inline requests.
 * You control your bots using HTTPS requests to our bot API.
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Bot
 * @package bot
 * @link https://core.telegram.org/bots
 */
class Bot extends Object
{

    /**
     * The telegram's bot id
     * @var int
     */
    public static $id;

    /**
     * The telegram's bot private key
     * @var string
     */
    public static $key;

    /**
     * The telegram's bot token
     * @var string
     */
    public static $token;

    /**
     * The telegram's bot api
     * @var API
     */
    public static $api;

    /**
     * Telegram send update,
     * and catch in update object.
     *
     * @var Update
     */
    public static $update;

    /**
     * Who send update
     * @var User
     */
    public static $user;

    /**
     * The user is hosted in a chat
     * @var Chat
     */
    public static $chat;

    /**
     * Configures an object with the initial property values.
     * @param object $object the object to be configured
     * @param array $properties the property initial values given in terms of name-value pairs.
     * @return object the object itself
     */
    public static function configure($object, $properties)
    {
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }

        return $object;
    }

    /**
     * New incoming message of text.
     *
     * @param string $pattern
     * @param string|array|callable $callback
     * @return bool
     */
    public static function text($pattern, $callback)
    {
        if (self::$update->hasMessage()) {
            $message = self::$update->getMessage();
            if ($message->hasText()) {
                $text = $message->getText();
                if (Comparator::compare($pattern, $text, $params)) {
                    (new Callback($callback, $params));
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * New version of a message that is known to
     * the bot and was edited.
     *
     * @param string $pattern
     * @param string|array|callable $callback
     * @return bool
     */
    public static function editedText($pattern, $callback)
    {
        if (self::$update->hasEditedMessage()) {
            $message = self::$update->getEditedMessage();
            if ($message->hasText()) {
                $text = $message->getText();
                if (Comparator::compare($pattern, $text, $params)) {
                    (new Callback($callback, $params));
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * New incoming channel post of text.
     *
     * @param string $pattern
     * @param string|array|callable $callback
     * @return bool
     */
    public static function channelText($pattern, $callback)
    {
        if (self::$update->hasChannelPost()) {
            $message = self::$update->getChannelPost();
            if ($message->hasText()) {
                $text = $message->getText();
                if (Comparator::compare($pattern, $text, $params)) {
                    (new Callback($callback, $params));
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * New version of a channel post that is known to
     * the bot and was edited.
     *
     * @param string $pattern
     * @param string|array|callable $callback
     * @return bool
     */
    public static function editedChannelText($pattern, $callback)
    {
        if (self::$update->hasEditedChannelPost()) {
            $message = self::$update->getEditedChannelPost();
            if ($message->hasText()) {
                $text = $message->getText();
                if (Comparator::compare($pattern, $text, $params)) {
                    (new Callback($callback, $params));
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * New incoming inline query.
     *
     * @param string $pattern
     * @param string|array|callable $callback
     * @return bool
     */
    public static function query($pattern, $callback)
    {
        if (self::$update->hasInlineQuery()) {
            $inline = self::$update->getInlineQuery();
            if ($inline->hasQuery()) {
                $query = $inline->getQuery();
                if (Comparator::compare($pattern, $query, $params)) {
                    (new Callback($callback, $params));
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * The result of an inline query that was chosen
     * by a user and sent to their chat partner.
     *
     * @param string $pattern
     * @param string|array|callable $callback
     * @return bool
     */
    public static function result($pattern, $callback)
    {
        if (self::$update->hasChosenInlineResult()) {
            $result = self::$update->getChosenInlineResult();
            if ($result->hasResultId()) {
                $result_id = $result->getResultId();
                if (Comparator::compare($pattern, $result_id, $params)) {
                    (new Callback($callback, $params));
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * New incoming callback query.
     *
     * @param string $pattern
     * @param string|array|callable $callback
     * @return bool
     */
    public static function data($pattern, $callback)
    {
        if (self::$update->hasCallbackQuery()) {
            $cQuery = self::$update->getCallbackQuery();
            if ($cQuery->hasData()) {
                $data = $cQuery->getData();
                if (Comparator::compare($pattern, $data, $params)) {
                    (new Callback($callback, $params));
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * New incoming shipping query. Only for
     * invoices with flexible price.
     *
     * @param string $pattern
     * @param string|array|callable $callback
     * @return bool
     */
    public static function shipping($pattern, $callback)
    {
        if (self::$update->hasShippingQuery()) {
            $shipping = self::$update->getShippingQuery();
            if ($shipping->hasId()) {
                $id = $shipping->getId();
                if (Comparator::compare($pattern, $id, $params)) {
                    (new Callback($callback, $params));
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * New incoming pre-checkout query.
     * Contains full information about checkout.
     *
     * @param string $pattern
     * @param string|array|callable $callback
     * @return bool
     */
    public static function preCheckout($pattern, $callback)
    {
        if (self::$update->hasPreCheckoutQuery()) {
            $query = self::$update->getPreCheckoutQuery();
            if ($query->hasId()) {
                $id = $query->getId();
                if (Comparator::compare($pattern, $id, $params)) {
                    (new Callback($callback, $params));
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Initializes the object.
     * This method is invoked at the end of the constructor after
     * the object is initialized with the given configuration.
     */
    public function init()
    {
        $update = file_get_contents('php://input');
        if (!empty($update) && is_string($update)) {
            self::setUpdate($update);
        }

        parent::init();
    }

    /**
     * Set the telegram's bot id.
     * @param int $id
     */
    public function setId($id)
    {
        if (is_int($id)) {
            self::$id = $id;

            if (isset(self::$key)) {
                $this->setToken(self::$id . ':' . self::$key);
            }
        }
    }

    /**
     * Set the telegram's bot private key.
     * @param string $key
     */
    public function setKey($key)
    {
        if (is_string($key)) {
            self::$key = $key;

            if (isset(self::$id)) {
                $this->setToken(self::$id . ':' . self::$key);
            }
        }
    }

    /**
     * Set the telegram's bot id and private key.
     * @param string $token
     */
    public function setToken($token)
    {
        $tObj = new Token($token);
        self::$id = $tObj->getId();
        self::$key = $tObj->getKey();
        self::$token = $tObj->getToken();
        self::$api = new API(self::$token);
    }

    /**
     * Set Update, User, Chat object by telegram's update.
     * @param string|array $update telegram send
     */
    public function setUpdate($update)
    {
        if (is_string($update)) {
            $update = Json::decode($update, true);
        }

        self::$update = new Update($update);
        self::$user = self::$update->getFrom();
        self::$chat = self::$update->getChat();
    }
}