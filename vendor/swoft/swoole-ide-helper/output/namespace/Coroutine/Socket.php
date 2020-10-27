<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine;

/**
 * @since 4.4.7
 */
class Socket
{

    // property of the class Socket
    public $fd;
    public $errCode;
    public $errMsg;

    /**
     * @param string $domain
     * @param $type
     * @param $protocol
     * @return mixed
     */
    public function __construct(string $domain, $type, $protocol = null){}

    /**
     * @param string $address
     * @param int $port
     * @return mixed
     */
    public function bind(string $address, int $port = null){}

    /**
     * @param int $backlog
     * @return mixed
     */
    public function listen(int $backlog = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function accept(float $timeout = null){}

    /**
     * @param string $host
     * @param int $port
     * @param float $timeout
     * @return mixed
     */
    public function connect(string $host, int $port = null, float $timeout = null){}

    /**
     * @param int $length
     * @param float $timeout
     * @return mixed
     */
    public function recv(int $length = null, float $timeout = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function recvPacket(float $timeout = null){}

    /**
     * @param mixed $data
     * @param float $timeout
     * @return mixed
     */
    public function send($data, float $timeout = null){}

    /**
     * @param string $filename
     * @param int $offset
     * @param int $length
     * @return mixed
     */
    public function sendFile(string $filename, int $offset = null, int $length = null){}

    /**
     * @param int $length
     * @param float $timeout
     * @return mixed
     */
    public function recvAll(int $length = null, float $timeout = null){}

    /**
     * @param mixed $data
     * @param float $timeout
     * @return mixed
     */
    public function sendAll($data, float $timeout = null){}

    /**
     * @param $peername
     * @param float $timeout
     * @return mixed
     */
    public function recvfrom($peername, float $timeout = null){}

    /**
     * @param $addr
     * @param int $port
     * @param mixed $data
     * @return mixed
     */
    public function sendto($addr, int $port, $data){}

    /**
     * @param $level
     * @param $opt_name
     * @return mixed
     */
    public function getOption($level, $opt_name){}

    /**
     * @param array $settings
     * @return mixed
     */
    public function setProtocol(array $settings){}

    /**
     * @param $level
     * @param $opt_name
     * @param $opt_value
     * @return mixed
     */
    public function setOption($level, $opt_name, $opt_value){}

    /**
     * @param $how
     * @return mixed
     */
    public function shutdown($how = null){}

    /**
     * @param $event
     * @return mixed
     */
    public function cancel($event = null){}

    /**
     * @return mixed
     */
    public function close(){}

    /**
     * @return mixed
     */
    public function getpeername(){}

    /**
     * @return mixed
     */
    public function getsockname(){}
}