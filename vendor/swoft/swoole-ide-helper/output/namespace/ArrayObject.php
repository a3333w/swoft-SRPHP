<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole;

/**
 * @since 4.4.7
 */
class ArrayObject implements \ArrayAccess, \Serializable, \Countable, \Iterator
{

    // property of the class ArrayObject
    protected $array;

    /**
     * @param array $array
     * @return mixed
     */
    public function __construct(array $array = null){}

    /**
     * @return mixed
     */
    public function isEmpty(){}

    /**
     * @return mixed
     */
    public function count(){}

    /**
     * @return mixed
     */
    public function current(){}

    /**
     * @return mixed
     */
    public function key(){}

    /**
     * @return mixed
     */
    public function valid(){}

    /**
     * @return mixed
     */
    public function rewind(){}

    /**
     * @return mixed
     */
    public function next(){}

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function set(string $key, $value){}

    /**
     * @param string $key
     * @return mixed
     */
    public function delete(string $key){}

    /**
     * @param $value
     * @param bool $strict
     * @param bool $loop
     * @return mixed
     */
    public function remove($value, bool $strict = null, bool $loop = null){}

    /**
     * @return mixed
     */
    public function clear(){}

    /**
     * @param string $key
     * @return mixed
     */
    public function offsetGet(string $key){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function offsetSet(string $key, $value){}

    /**
     * @param string $key
     * @return mixed
     */
    public function offsetUnset(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function offsetExists(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function exists(string $key){}

    /**
     * @param $value
     * @param bool $strict
     * @return mixed
     */
    public function contains($value, bool $strict = null){}

    /**
     * @param $value
     * @param bool $strict
     * @return mixed
     */
    public function indexOf($value, bool $strict = null){}

    /**
     * @param $value
     * @param bool $strict
     * @return mixed
     */
    public function lastIndexOf($value, bool $strict = null){}

    /**
     * @param $needle
     * @param $strict
     * @return mixed
     */
    public function search($needle, $strict = null){}

    /**
     * @param string $glue
     * @return mixed
     */
    public function join(string $glue = null){}

    /**
     * @return mixed
     */
    public function serialize(){}

    /**
     * @param string $string
     * @return mixed
     */
    public function unserialize(string $string){}

    /**
     * @return mixed
     */
    public function sum(){}

    /**
     * @return mixed
     */
    public function product(){}

    /**
     * @param $value
     * @return mixed
     */
    public function push($value){}

    /**
     * @param $value
     * @return mixed
     */
    public function pushBack($value){}

    /**
     * @param int $offset
     * @param $value
     * @return mixed
     */
    public function insert(int $offset, $value){}

    /**
     * @return mixed
     */
    public function pop(){}

    /**
     * @return mixed
     */
    public function popFront(){}

    /**
     * @param int $offset
     * @param int $length
     * @param bool $preserve_keys
     * @return mixed
     */
    public function slice(int $offset, int $length = null, bool $preserve_keys = null){}

    /**
     * @return mixed
     */
    public function randomGet(){}

    /**
     * @param callable $fn
     * @return mixed
     */
    public function each(callable $fn){}

    /**
     * @param callable $fn
     * @return mixed
     */
    public function map(callable $fn){}

    /**
     * @param callable $fn
     * @return mixed
     */
    public function reduce(callable $fn){}

    /**
     * @param int $search_value
     * @param $strict
     * @return mixed
     */
    public function keys(int $search_value = null, $strict = null){}

    /**
     * @return mixed
     */
    public function values(){}

    /**
     * @param $column_key
     * @param ...$index
     * @return mixed
     */
    public function column($column_key, ...$index){}

    /**
     * @param int $sort_flags
     * @return mixed
     */
    public function unique(int $sort_flags = null){}

    /**
     * @param bool $preserve_keys
     * @return mixed
     */
    public function reverse(bool $preserve_keys = null){}

    /**
     * @param int $size
     * @param bool $preserve_keys
     * @return mixed
     */
    public function chunk(int $size, bool $preserve_keys = null){}

    /**
     * @return mixed
     */
    public function flip(){}

    /**
     * @param callable $fn
     * @param int $flag
     * @return mixed
     */
    public function filter(callable $fn, int $flag = null){}

    /**
     * @param int $sort_order
     * @param int $sort_flags
     * @return mixed
     */
    public function multiSort(int $sort_order = null, int $sort_flags = null){}

    /**
     * @param int $sort_flags
     * @return mixed
     */
    public function asort(int $sort_flags = null){}

    /**
     * @param int $sort_flags
     * @return mixed
     */
    public function arsort(int $sort_flags = null){}

    /**
     * @param int $sort_flags
     * @return mixed
     */
    public function krsort(int $sort_flags = null){}

    /**
     * @param int $sort_flags
     * @return mixed
     */
    public function ksort(int $sort_flags = null){}

    /**
     * @return mixed
     */
    public function natcasesort(){}

    /**
     * @return mixed
     */
    public function natsort(){}

    /**
     * @param int $sort_flags
     * @return mixed
     */
    public function rsort(int $sort_flags = null){}

    /**
     * @return mixed
     */
    public function shuffle(){}

    /**
     * @param int $sort_flags
     * @return mixed
     */
    public function sort(int $sort_flags = null){}

    /**
     * @param callable $value_compare_func
     * @return mixed
     */
    public function uasort(callable $value_compare_func){}

    /**
     * @param callable $value_compare_func
     * @return mixed
     */
    public function uksort(callable $value_compare_func){}

    /**
     * @param callable $value_compare_func
     * @return mixed
     */
    public function usort(callable $value_compare_func){}

    /**
     * @return mixed
     */
    public function __toArray(){}

    /**
     * @param $value
     * @return mixed
     */
    protected static function detectType($value){}

    /**
     * @param string $value
     * @return mixed
     */
    protected static function detectStringType(string $value){}

    /**
     * @param array $value
     * @return mixed
     */
    protected static function detectArrayType(array $value){}
}