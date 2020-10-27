<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Connection;

/**
 * @since 4.4.7
 */
class Iterator implements \Iterator, \ArrayAccess, \Countable
{


    /**
     * @return mixed
     */
    public function __construct(){}

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

    /**
     * @return mixed
     */
    public function count(){}

    /**
     * @param int $fd
     * @return mixed
     */
    public function offsetExists(int $fd){}

    /**
     * @param int $fd
     * @return mixed
     */
    public function offsetGet(int $fd){}

    /**
     * @param int $fd
     * @param $value
     * @return mixed
     */
    public function offsetSet(int $fd, $value){}

    /**
     * @param int $fd
     * @return mixed
     */
    public function offsetUnset(int $fd){}
}