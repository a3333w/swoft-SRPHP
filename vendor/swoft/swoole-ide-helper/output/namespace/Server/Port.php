<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Server;

/**
 * @since 4.4.7
 */
class Port
{

    // property of the class Port
    public $host;
    public $port;
    public $type;
    public $sock;
    public $setting;
    public $connections;

    /**
     * @param array $settings
     * @return mixed
     */
    public function set(array $settings){}

    /**
     * @param string $event_name
     * @param callable $callback
     * @return mixed
     */
    public function on(string $event_name, callable $callback){}

    /**
     * @param string $event_name
     * @return mixed
     */
    public function getCallback(string $event_name){}

    /**
     * @return mixed
     */
    public function getSocket(){}
}