<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole;

/**
 * @since 4.4.7
 */
class Lock
{
    // constants of the class Lock
    public const FILELOCK = 2;
    public const MUTEX = 3;
    public const SEM = 4;
    public const RWLOCK = 1;
    public const SPINLOCK = 5;

    // property of the class Lock
    public $errCode;

    /**
     * @param $type
     * @param string $filename
     * @return mixed
     */
    public function __construct($type = null, string $filename = null){}

    /**
     * @return mixed
     */
    public function lock(){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function lockwait(float $timeout = null){}

    /**
     * @return mixed
     */
    public function trylock(){}

    /**
     * @return mixed
     */
    public function lock_read(){}

    /**
     * @return mixed
     */
    public function trylock_read(){}

    /**
     * @return mixed
     */
    public function unlock(){}

    /**
     * @return mixed
     */
    public function destroy(){}
}