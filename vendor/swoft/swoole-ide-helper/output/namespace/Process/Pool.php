<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Process;

/**
 * @since 4.4.7
 */
class Pool
{

    // property of the class Pool
    public $master_pid;
    public $workers;

    /**
     * @param int $worker_num
     * @param int $ipc_type
     * @param int $msgqueue_key
     * @param bool $enable_coroutine
     * @return mixed
     */
    public function __construct(int $worker_num, int $ipc_type = null, int $msgqueue_key = null, bool $enable_coroutine = null){}

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
     * @param int $worker_id
     * @return mixed
     */
    public function getProcess(int $worker_id = null){}

    /**
     * @param string $host
     * @param int $port
     * @param int $backlog
     * @return mixed
     */
    public function listen(string $host, int $port = null, int $backlog = null){}

    /**
     * @param mixed $data
     * @return mixed
     */
    public function write($data){}

    /**
     * @return mixed
     */
    public function start(){}

    /**
     * @return mixed
     */
    public function shutdown(){}
}