<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole;

/**
 * @since 4.4.7
 */
class Table implements \Iterator, \ArrayAccess, \Countable
{
    // constants of the class Table
    public const TYPE_INT = 1;
    public const TYPE_STRING = 7;
    public const TYPE_FLOAT = 6;


    /**
     * @param $table_size
     * @param $conflict_proportion
     * @return mixed
     */
    public function __construct($table_size, $conflict_proportion = null){}

    /**
     * @param string $name
     * @param $type
     * @param int $size
     * @return mixed
     */
    public function column(string $name, $type, int $size = null){}

    /**
     * @return mixed
     */
    public function create(){}

    /**
     * @return mixed
     */
    public function destroy(){}

    /**
     * @param string $key
     * @param array $value
     * @return mixed
     */
    public function set(string $key, array $value){}

    /**
     * @param string $key
     * @param string $field
     * @return mixed
     */
    public function get(string $key, string $field = null){}

    /**
     * @return mixed
     */
    public function count(){}

    /**
     * @param string $key
     * @return mixed
     */
    public function del(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function exists(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function exist(string $key){}

    /**
     * @param string $key
     * @param $column
     * @param $incrby
     * @return mixed
     */
    public function incr(string $key, $column, $incrby = null){}

    /**
     * @param string $key
     * @param $column
     * @param $decrby
     * @return mixed
     */
    public function decr(string $key, $column, $decrby = null){}

    /**
     * @return mixed
     */
    public function getMemorySize(){}

    /**
     * @param int $offset
     * @return mixed
     */
    public function offsetExists(int $offset){}

    /**
     * @param int $offset
     * @return mixed
     */
    public function offsetGet(int $offset){}

    /**
     * @param int $offset
     * @param $value
     * @return mixed
     */
    public function offsetSet(int $offset, $value){}

    /**
     * @param int $offset
     * @return mixed
     */
    public function offsetUnset(int $offset){}

    /**
     * @return mixed
     */
    public function rewind(){}

    /**
     * @return mixed
     */
    public function next(){}

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
}