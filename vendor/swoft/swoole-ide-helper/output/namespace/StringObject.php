<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole;

/**
 * @since 4.4.7
 */
class StringObject
{

    // property of the class StringObject
    protected $string;

    /**
     * @param string $string
     * @return mixed
     */
    public function __construct(string $string = null){}

    /**
     * @return mixed
     */
    public function length(){}

    /**
     * @param string $needle
     * @param int $offset
     * @return mixed
     */
    public function indexOf(string $needle, int $offset = null){}

    /**
     * @param string $needle
     * @param int $offset
     * @return mixed
     */
    public function lastIndexOf(string $needle, int $offset = null){}

    /**
     * @param string $needle
     * @param int $offset
     * @return mixed
     */
    public function pos(string $needle, int $offset = null){}

    /**
     * @param string $needle
     * @param int $offset
     * @return mixed
     */
    public function rpos(string $needle, int $offset = null){}

    /**
     * @param string $needle
     * @return mixed
     */
    public function ipos(string $needle){}

    /**
     * @return mixed
     */
    public function lower(){}

    /**
     * @return mixed
     */
    public function upper(){}

    /**
     * @return mixed
     */
    public function trim(){}

    /**
     * @return mixed
     */
    public function lrim(){}

    /**
     * @return mixed
     */
    public function rtrim(){}

    /**
     * @param int $offset
     * @param ...$length
     * @return mixed
     */
    public function substr(int $offset, ...$length){}

    /**
     * @param $n
     * @return mixed
     */
    public function repeat($n){}

    /**
     * @param string $search
     * @param string $replace
     * @param $count
     * @return mixed
     */
    public function replace(string $search, string $replace, $count = null){}

    /**
     * @param string $needle
     * @return mixed
     */
    public function startsWith(string $needle){}

    /**
     * @param string $subString
     * @return mixed
     */
    public function contains(string $subString){}

    /**
     * @param string $needle
     * @return mixed
     */
    public function endsWith(string $needle){}

    /**
     * @param string $delimiter
     * @param int $limit
     * @return mixed
     */
    public function split(string $delimiter, int $limit = null){}

    /**
     * @param int $index
     * @return mixed
     */
    public function char(int $index){}

    /**
     * @param int $chunkLength
     * @param string $chunkEnd
     * @return mixed
     */
    public function chunkSplit(int $chunkLength = null, string $chunkEnd = null){}

    /**
     * @param $splitLength
     * @return mixed
     */
    public function chunk($splitLength = null){}

    /**
     * @return mixed
     */
    public function toString(){}

    /**
     * @return mixed
     */
    public function __toString(){}

    /**
     * @param array $value
     * @return mixed
     */
    protected static function detectArrayType(array $value){}
}