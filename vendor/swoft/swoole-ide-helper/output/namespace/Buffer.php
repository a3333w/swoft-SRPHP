<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole;

/**
 * @since 4.4.7
 */
class Buffer
{

    // property of the class Buffer
    public $capacity;
    public $length;

    /**
     * @param int $size
     * @return mixed
     */
    public function __construct(int $size = null){}

    /**
     * @return mixed
     */
    public function __toString(){}

    /**
     * @param int $offset
     * @param int $length
     * @param $remove
     * @return mixed
     */
    public function substr(int $offset, int $length = null, $remove = null){}

    /**
     * @param int $offset
     * @param mixed $data
     * @return mixed
     */
    public function write(int $offset, $data){}

    /**
     * @param int $offset
     * @param int $length
     * @return mixed
     */
    public function read(int $offset, int $length){}

    /**
     * @param mixed $data
     * @return mixed
     */
    public function append($data){}

    /**
     * @param int $size
     * @return mixed
     */
    public function expand(int $size){}

    /**
     * @return mixed
     */
    public function recycle(){}

    /**
     * @return mixed
     */
    public function clear(){}
}