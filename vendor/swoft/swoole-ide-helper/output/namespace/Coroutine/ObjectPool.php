<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine;

/**
 * @since 4.4.7
 */
abstract class ObjectPool
{

    // property of the class ObjectPool
    protected static $context;
    protected $object_pool;
    protected $busy_pool;
    protected $type;

    /**
     * @param $type
     * @param $pool_size
     * @param $concurrency
     * @return mixed
     */
    public function __construct($type, $pool_size = null, $concurrency = null){}

    /**
     * @return mixed
     */
    public function get(){}

    /**
     * @return mixed
     */
    public function free(){}

    /**
     * @return mixed
     */
    abstract public function create();
}