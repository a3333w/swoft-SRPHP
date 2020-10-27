<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine;

/**
 * @since 4.4.7
 */
class Client
{
    // constants of the class Client
    public const MSG_OOB = 1;
    public const MSG_PEEK = 2;
    public const MSG_DONTWAIT = 64;
    public const MSG_WAITALL = 256;

    // property of the class Client
    public $errCode;
    public $errMsg;
    public $fd;
    public $type;
    public $setting;
    public $connected;

    /**
     * @param $type
     * @return mixed
     */
    public function __construct($type){}

    /**
     * @param array $settings
     * @return mixed
     */
    public function set(array $settings){}

    /**
     * @param string $host
     * @param int $port
     * @param float $timeout
     * @param $sock_flag
     * @return mixed
     */
    public function connect(string $host, int $port = null, float $timeout = null, $sock_flag = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function recv(float $timeout = null){}

    /**
     * @param int $length
     * @return mixed
     */
    public function peek(int $length = null){}

    /**
     * @param mixed $data
     * @return mixed
     */
    public function send($data){}

    /**
     * @param string $filename
     * @param int $offset
     * @param int $length
     * @return mixed
     */
    public function sendfile(string $filename, int $offset = null, int $length = null){}

    /**
     * @param string $address
     * @param int $port
     * @param mixed $data
     * @return mixed
     */
    public function sendto(string $address, int $port, $data){}

    /**
     * @param int $length
     * @param string $address
     * @param int $port
     * @return mixed
     */
    public function recvfrom(int $length, string $address, int $port = null){}

    /**
     * @return mixed
     */
    public function enableSSL(){}

    /**
     * @return mixed
     */
    public function getPeerCert(){}

    /**
     * @return mixed
     */
    public function verifyPeerCert(){}

    /**
     * @return mixed
     */
    public function isConnected(){}

    /**
     * @return mixed
     */
    public function getsockname(){}

    /**
     * @return mixed
     */
    public function getpeername(){}

    /**
     * @return mixed
     */
    public function close(){}

    /**
     * @return mixed
     */
    public function exportSocket(){}
}