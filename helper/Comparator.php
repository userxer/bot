<?php namespace bot\helper;

use yii\base\Object;
use yii\helpers\ArrayHelper as AH;
use yii\base\InvalidParamException;

/**
 * Compare two strings and get information and
 * variables from strings.
 *
 * @property string $query
 * @property string $pattern
 * @property array $variables
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Comparator
 * @package bot\helper
 */
class Comparator extends Object
{

    /**
     * The pattern to search for.
     * It can be either a string or an array with strings.
     *
     * @var string
     */
    const EXPRESSION_PATTERN = '/(.)?\$\{([\w._-]+)(\?)?\,?\s?([^\}]+)?\}/';

    /**
     * words that have semantic interactions
     * with the class.
     *
     * @var string
     */
    const SENSITIVE_WORDS = '!@#$%^&*()-=_+[]{}.,';

    /**
     * The string with variables values.
     * @var string
     */
    private $_query;

    /**
     * A pattern for comparison with query string
     * @var string
     */
    private $_pattern;

    /**
     * The variables get from query string.
     * @var array
     */
    private $_variables = [];

    /**
     * Compare two strings,
     * without create class's object.
     *
     * @param string $pattern a pattern for comparison with query string.
     * @param string $query the string with variables values.
     * @param array $params the variables get from query string.
     * @return bool
     */
    public static function compare($pattern, $query, &$params = [])
    {
        $params = (array) $params;
        $comparator = new static($pattern);

        if ($comparator->checkout($query)) {
            $params = AH::merge($params, $comparator->getVariables());
            return true;
        }

        return false;
    }

    /**
     * Comparator constructor.
     * @param string $pattern the pattern for comparison
     * with query string.
     */
    public function __construct($pattern)
    {
        if (is_string($pattern)) {
            $this->_pattern = str_replace(
                ['\/', '/'], ['/', '\/'], $pattern
            );

            $letters = str_split(self::SENSITIVE_WORDS);
            foreach ($letters as $letter) {
                $this->_pattern = str_replace(
                    $letter, '\\' . $letter, $this->_pattern
                );
            }
        }
        else {
            $message = 'Invalid Param: pattern must be string.';
            throw new InvalidParamException($message);
        }

        parent::__construct();
    }

    /**
     * checkout and get variables from query string. if strings matches,
     * return true, otherwise return false.
     *
     * @param string $query the string with variables values.
     * @return bool
     */
    public function checkout($query)
    {
        if (!is_string($query)) {
            $message = 'Invalid Param: query must be string.';
            throw new InvalidParamException($message);
        }

        $this->_query = $query;
        $this->_variables = [];
        $pattern = $this->createPregPattern();
        
        if (preg_match($pattern, $query, $matches)) {
            if (sizeof($matches) > 0) {
                foreach ($matches as $key => $value) {
                    if (is_string($key) && !empty($value)) {
                        $this->_variables[$key] = $value;
                    }
                }

                return true;
            }
        }

        return false;
    }

    /**
     * The string with variables values.
     * @return string
     */
    public function getQuery()
    {
        return $this->_query;
    }

    /**
     * A pattern for comparison with query string
     * @return string
     */
    public function getPattern()
    {
        return $this->_pattern;
    }

    /**
     * The variables get from query string.
     * @return array
     */
    public function getVariables()
    {
        return $this->_variables;
    }

    /**
     * Change User's pattern to machine's pattern for
     * send to preg_match.
     *
     * @return string
     */
    private function createPregPattern()
    {
        $newPattern = preg_replace_callback(

            // preg replace pattern
            self::EXPRESSION_PATTERN,

            // preg replace callback
            function ($match) {
                $after = '';
                $before = '';
                $name = $match[2];
                $pattern = isset($match[4]) ? $match[4] : '[^\/\s]+';
                $optional = isset($match[3]) && $match[3] == '?' ? true : false;

                if ($optional && isset($match[1]))
                    $before = $match[1] == ' ' ? '\s?' : $match[1];
                else
                    $before = isset($match[1]) ? $match[1] : '';

                if ($optional) {
                    $after = ')?';
                    $before = '(?:' . $before;
                }

                $var = '(?P<' . $name . '>' . $pattern . ')';
                return $before . $var . $after;
            },

            // preg replace subject
            $this->_pattern

        );

        return '/^' . $newPattern . '$/';
    }
}