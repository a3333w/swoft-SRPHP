<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Http;

/**
 * @since 4.4.7
 */
class Server extends \Swoole\Server
{

    // property of the class Server
    public $setting;
    public $connections;
    public $host;
    public $port;
    public $type;
    public $mode;
    public $ports;
    public $master_pid;
    public $manager_pid;
    public $worker_id;
    public $taskworker;
    public $worker_pid;

    /**
     * @param string $host
     * @param int $port
     * @param $mode
     * @param $sock_type
     * @return mixed
     */
    public function __construct(string $host, int $port = null, $mode = null, $sock_type = null){}

    /**
     * @param string $host
     * @param int $port
     * @param $sock_type
     * @return mixed
     */
    public function listen(string $host, int $port, $sock_type){}

    /**
     * @param string $host
     * @param int $port
     * @param $sock_type
     * @return mixed
     */
    public function addlistener(string $host, int $port, $sock_type){}

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
     * @param array $settings
     * @return mixed
     */
    public function set(array $settings){}

    /**
     * @return mixed
     */
    public function start(){}

    /**
     * Send data to the client
     * @param int $fd
     * @param string $send_data
     * @param int $server_socket
     * @return bool If success return True, fail return False
     */
    public function send(int $fd, string $send_data, int $server_socket = null){}

    /**
     * @param string $ip
     * @param int $port
     * @param string $send_data
     * @param int $server_socket
     * @return mixed
     */
    public function sendto(string $ip, int $port, string $send_data, int $server_socket = null){}

    /**
     * @param int $conn_fd
     * @param string $send_data
     * @return mixed
     */
    public function sendwait(int $conn_fd, string $send_data){}

    /**
     * @param int $fd
     * @return mixed
     */
    public function exists(int $fd){}

    /**
     * @param int $fd
     * @return mixed
     */
    public function exist(int $fd){}

    /**
     * @param int $fd
     * @param bool $is_protected
     * @return mixed
     */
    public function protect(int $fd, bool $is_protected = null){}

    /**
     * @param int $conn_fd
     * @param string $filename
     * @param int $offset
     * @param int $length
     * @return mixed
     */
    public function sendfile(int $conn_fd, string $filename, int $offset = null, int $length = null){}

    /**
     * @param int $fd
     * @param bool $reset
     * @return mixed
     */
    public function close(int $fd, bool $reset = null){}

    /**
     * @param int $fd
     * @return mixed
     */
    public function confirm(int $fd){}

    /**
     * @param int $fd
     * @return mixed
     */
    public function pause(int $fd){}

    /**
     * @param int $fd
     * @return mixed
     */
    public function resume(int $fd){}

    /**
     * @param mixed $data
     * @param int $worker_id
     * @param callable $finish_callback
     * @return mixed
     */
    public function task($data, int $worker_id = null, callable $finish_callback = null){}

    /**
     * @param mixed $data
     * @param float $timeout
     * @param int $worker_id
     * @return mixed
     */
    public function taskwait($data, float $timeout = null, int $worker_id = null){}

    /**
     * @param array $tasks
     * @param float $timeout
     * @return mixed
     */
    public function taskWaitMulti(array $tasks, float $timeout = null){}

    /**
     * @param array $tasks
     * @param float $timeout
     * @return mixed
     */
    public function taskCo(array $tasks, float $timeout = null){}

    /**
     * @param mixed $data
     * @return mixed
     */
    public function finish($data){}

    /**
     * @return mixed
     */
    public function reload(){}

    /**
     * @return mixed
     */
    public function shutdown(){}

    /**
     * @param int $worker_id
     * @return mixed
     */
    public function stop(int $worker_id = null){}

    /**
     * @return mixed
     */
    public function getLastError(){}

    /**
     * @param int $reactor_id
     * @return mixed
     */
    public function heartbeat(int $reactor_id){}

    /**
     * @param int $fd
     * @param int $reactor_id
     * @return mixed
     */
    public function getClientInfo(int $fd, int $reactor_id = null){}

    /**
     * @param int $start_fd
     * @param int $find_count
     * @return mixed
     */
    public function getClientList(int $start_fd, int $find_count = null){}

    /**
     * @param int $fd
     * @param int $reactor_id
     * @return mixed
     */
    public function connection_info(int $fd, int $reactor_id = null){}

    /**
     * @param int $start_fd
     * @param int $find_count
     * @return mixed
     */
    public function connection_list(int $start_fd, int $find_count = null){}

    /**
     * @param mixed $message
     * @param int $dst_worker_id
     * @return mixed
     */
    public function sendMessage($message, int $dst_worker_id){}

    /**
     * @param \Swoole\Process $process
     * @return mixed
     */
    public function addProcess(\Swoole\Process $process){}

    /**
     * @return mixed
     */
    public function stats(){}

    /**
     * @param int $port
     * @return mixed
     */
    public function getSocket(int $port = null){}

    /**
     * @param int $fd
     * @param int $uid
     * @return mixed
     */
    public function bind(int $fd, int $uid){}

    /**
     * @param int $ms
     * @param callable $callback
     * @return mixed
     */
    public function after(int $ms, callable $callback){}

    /**
     * @param int $ms
     * @param callable $callback
     * @return mixed
     */
    public function tick(int $ms, callable $callback){}

    /**
     * @param int $timer_id
     * @return mixed
     */
    public function clearTimer(int $timer_id){}

    /**
     * @param callable $callback
     * @return mixed
     */
    public function defer(callable $callback){}
}