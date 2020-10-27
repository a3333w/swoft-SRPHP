<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine\Http2;

/**
 * @since 4.4.7
 */
class Client
{

    // property of the class Client
    public $errCode;
    public $errMsg;
    public $sock;
    public $type;
    public $setting;
    public $connected;
    public $host;
    public $port;
    public $ssl;

    /**
     * @param string $host
     * @param int $port
     * @param $ssl
     * @return mixed
     */
    public function __construct(string $host, int $port = null, $ssl = null){}

    /**
     * @param array $settings
     * @return mixed
     */
    public function set(array $settings){}

    /**
     * @return mixed
     */
    public function connect(){}

    /**
     * @param string $key
     * @return mixed
     */
    public function stats(string $key = null){}

    /**
     * @param $stream_id
     * @return mixed
     */
    public function isStreamExist($stream_id){}

    /**
     * @param $request
     * @return mixed
     */
    public function send($request){}

    /**
     * @param $stream_id
     * @param mixed $data
     * @param $end_stream
     * @return mixed
     */
    public function write($stream_id, $data, $end_stream = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function recv(float $timeout = null){}

    /**
     * @param $error_code
     * @param $debug_data
     * @return mixed
     */
    public function goaway($error_code = null, $debug_data = null){}

    /**
     * @return mixed
     */
    public function ping(){}

    /**
     * @return mixed
     */
    public function close(){}
}