<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine;

/**
 * @since 4.4.7
 */
class Server
{

    // property of the class Server
    public $host;
    public $port;
    public $type;
    public $fd;
    public $errCode;
    public $setting;
    protected $running;
    protected $fn;
    protected $socket;

    /**
     * @param string $host
     * @param int $port
     * @param bool $ssl
     * @param bool $reuse_port
     * @return mixed
     */
    public function __construct(string $host, int $port = null, bool $ssl = null, bool $reuse_port = null){}

    /**
     * @param array $setting
     * @return mixed
     */
    public function set(array $setting){}

    /**
     * @param callable $fn
     * @return mixed
     */
    public function handle(callable $fn){}

    /**
     * @return mixed
     */
    public function shutdown(){}

    /**
     * @return mixed
     */
    public function start(){}
}