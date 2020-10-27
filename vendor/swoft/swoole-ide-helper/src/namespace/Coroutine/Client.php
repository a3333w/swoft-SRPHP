<?php
namespace Swoole\Coroutine;

/**
 * @since 4.3.3
 */
class Client
{
    const MSG_OOB = 1;
    const MSG_PEEK = 2;
    const MSG_DONTWAIT = 64;
    const MSG_WAITALL = 256;

    public $errCode;
    public $errMsg;
    public $sock;
    public $type;
    public $setting;
    public $connected;

    /**
     * @param $type [required]
     * @return mixed
     */
    public function __construct($type){}

    /**
     * @return mixed
     */
    public function __destruct(){}

    /**
     * @param $settings [required]
     * @return mixed
     */
    public function set(array $settings){}

    /**
     * @param $host [required]
     * @param $port [optional]
     * @param $timeout [optional]
     * @param $sock_flag [optional]
     * @return mixed
     */
    public function connect(string $host, int $port=null, float $timeout=null, $sock_flag=null){}

    /**
     * @param $timeout [optional]
     * @return mixed
     */
    public function recv(float $timeout=null){}

    /**
     * @param $length [optional]
     * @return mixed
     */
    public function peek(int $length=null){}

    /**
     * @param $data [required]
     * @return mixed
     */
    public function send($data){}

    /**
     * @param $filename [required]
     * @param $offset [optional]
     * @param $length [optional]
     * @return mixed
     */
    public function sendfile(string $filename, int $offset=null, int $length=null){}

    /**
     * @param $address [required]
     * @param $port [required]
     * @param $data [required]
     * @return mixed
     */
    public function sendto($address, int $port, $data){}

    /**
     * @param $length [required]
     * @param $address [required]
     * @param $port [optional]
     * @return mixed
     */
    public function recvfrom(int $length, $address, int $port=null){}

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


}
