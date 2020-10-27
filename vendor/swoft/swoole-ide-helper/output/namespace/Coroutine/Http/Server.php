<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine\Http;

/**
 * @since 4.4.7
 */
class Server
{

    // property of the class Server
    public $fd;
    public $host;
    public $port;
    public $ssl;
    public $settings;
    public $errCode;
    public $errMsg;

    /**
     * @param string $host
     * @param int $port
     * @param $ssl
     * @param $reuse_port
     * @return mixed
     */
    public function __construct(string $host, int $port = null, $ssl = null, $reuse_port = null){}

    /**
     * @param array $settings
     * @return mixed
     */
    public function set(array $settings){}

    /**
     * @param string $pattern
     * @param callable $callback
     * @return mixed
     */
    public function handle(string $pattern, callable $callback){}

    /**
     * @return mixed
     */
    public function onAccept(){}

    /**
     * @return mixed
     */
    public function start(){}

    /**
     * @return mixed
     */
    public function shutdown(){}
}