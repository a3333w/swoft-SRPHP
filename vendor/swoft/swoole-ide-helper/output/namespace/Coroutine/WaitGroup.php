<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine;

/**
 * @since 4.4.7
 */
class WaitGroup
{

    // property of the class WaitGroup
    protected $chan;
    protected $count;
    protected $waiting;

    /**
     * @return mixed
     */
    public function __construct(){}

    /**
     * @param int $delta
     * @return mixed
     */
    public function add(int $delta = null){}

    /**
     * @return mixed
     */
    public function done(){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function wait(float $timeout = null){}
}