<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine\Server;

/**
 * @since 4.4.7
 */
class Connection
{

    // property of the class Connection
    public $socket;

    /**
     * @param \Swoole\Coroutine\Socket $conn
     * @return mixed
     */
    public function __construct(\Swoole\Coroutine\Socket $conn){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function recv(float $timeout = null){}

    /**
     * @param mixed $data
     * @return mixed
     */
    public function send($data){}

    /**
     * @return mixed
     */
    public function close(){}
}