<?php namespace bot\helper;

use yii\base\Object;
use yii\base\InvalidParamException;

/**
 * Authorizing your bot
 * Each bot is given a unique authentication token when it is created.
 * The token looks something like 123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11,
 * but we'll use simply <token> in this document instead.
 *
 * You can learn about obtaining tokens and generating new ones
 * in this document:
 * https://core.telegram.org/bots#botfather
 *
 * @property int $id
 * @property string $key
 * @property string $token
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Token
 * @package bot\helper
 * @link https://core.telegram.org/bots/api#authorizing-your-bot
 */
class Token extends Object
{

    /**
     * The pattern to search for.
     * It can be either a string or an array with strings.
     *
     * @var string
     */
    const EXPRESSION_PATTERN = '/(\d+)\:(.*)/';

    /**
     * The telegram's bot ID.
     * @var int
     */
    private $_id;

    /**
     * The telegram's bot private key.
     * @var string
     */
    private $_key;

    /**
     * Token constructor.
     * @param string $token
     * @throws InvalidParamException
     */
    public function __construct($token)
    {
        $pattern = self::EXPRESSION_PATTERN;
        $preg = preg_match($pattern, $token, $matches);

        if ($preg && sizeof($matches) == 3) {
            $this->_key = $matches[2];
            $this->_id = intval($matches[1]);
        }
        else {
            $message = 'Invalid Token: ' . $token;
            throw new InvalidParamException($message);
        }

        parent::__construct();
    }

    /**
     * Return the telegram's bot ID.
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Return the telegram's bot private key.
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }

    /**
     * Return the telegram's bot token.
     * @return string
     */
    public function getToken()
    {
        return $this->_id . ':' . $this->_key;
    }
}
