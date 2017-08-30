<?php namespace bot\base;

use bot\object\Chat;
use bot\object\User;
use bot\helper\Token;
use yii\helpers\Json;
use bot\object\Update;
use bot\helper\Callback;
use bot\helper\Comparator;
use yii\helpers\ArrayHelper as AH;

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
class Bot extends \yii\base\Object
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
     * The bot properties
     * @var array
     */
    public static $configs = [];

    /**
     * Checks if a property is set, i.e.
     * defined and not null.
     *
     * Note that if the property is not defined,
     * false will be returned.
     *
     * @param string $key the property name or the event name
     * @return bool whether the named property is set (not null).
     */
    public static function has($key)
    {
        $configs = self::$configs;
        return AH::keyExists($key, $configs);
    }

    /**
     * Sets an object property to null.
     *
     * Note that if the property is not defined,
     * this method will do nothing.
     *
     * If the property is read-only,
     * it will throw an exception.
     *
     * @param string $key the property name
     * @return true
     */
    public static function remove($key)
    {
        AH::remove(self::$configs, $key);
        return true;
    }

    /**
     * Sets value of an object property.
     *
     * @param string $key the property name or the event name
     * @param mixed $value the property value
     * @return $this
     */
    public static function set($key, $value)
    {
        self::$configs[$key] = $value;
        return $value;
    }

    /**
     * Returns the value of an object property.
     *
     * @param string $key the property name
     * @param mixed $default the default value to be returned if the specified array
     * key does not exist. Not used when getting value from an object.
     *
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        $configs = self::$configs;
        return AH::getValue($configs, $key, $default);
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
                $params = self::$configs;
                $text = $message->getText();
                if (Comparator::compare($pattern, $text, $params)) {
                    Callback::call($callback, $params);
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
                $params = self::$configs;
                $text = $message->getText();
                if (Comparator::compare($pattern, $text, $params)) {
                    Callback::call($callback, $params);
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
                $params = self::$configs;
                $text = $message->getText();
                if (Comparator::compare($pattern, $text, $params)) {
                    Callback::call($callback, $params);
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
                $params = self::$configs;
                $text = $message->getText();
                if (Comparator::compare($pattern, $text, $params)) {
                    Callback::call($callback, $params);
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
                $params = self::$configs;
                $query = $inline->getQuery();
                if (Comparator::compare($pattern, $query, $params)) {
                    Callback::call($callback, $params);
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
                $params = self::$configs;
                $result_id = $result->getResultId();
                if (Comparator::compare($pattern, $result_id, $params)) {
                    Callback::call($callback, $params);
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
                $params = self::$configs;
                $data = $cQuery->getData();
                if (Comparator::compare($pattern, $data, $params)) {
                    Callback::call($callback, $params);
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
                $params = self::$configs;
                $id = $shipping->getId();
                if (Comparator::compare($pattern, $id, $params)) {
                    Callback::call($callback, $params);
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
                $params = self::$configs;
                $id = $query->getId();
                if (Comparator::compare($pattern, $id, $params)) {
                    Callback::call($callback, $params);
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
        self::$configs = [];
        $update = file_get_contents('php://input');
        
        if (
            self::$update == null && 
            !empty($update) && is_string($update)
        ) {
            $this->setUpdate($update);
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

            if (self::$key !== null) {
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

            if (self::$id !== null) {
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
