<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine;

/**
 * @since 4.4.7
 */
class MySQL
{

    // property of the class MySQL
    public $serverInfo;
    public $sock;
    public $connected;
    public $connect_errno;
    public $connect_error;
    public $affected_rows;
    public $insert_id;
    public $error;
    public $errno;

    /**
     * @return mixed
     */
    public function __construct(){}

    /**
     * @return mixed
     */
    public function getDefer(){}

    /**
     * @param $defer
     * @return mixed
     */
    public function setDefer($defer = null){}

    /**
     * @param array $server_config
     * @return mixed
     */
    public function connect(array $server_config = null){}

    /**
     * @param string $sql
     * @param float $timeout
     * @return mixed
     */
    public function query(string $sql, float $timeout = null){}

    /**
     * @return mixed
     */
    public function fetch(){}

    /**
     * @return mixed
     */
    public function fetchAll(){}

    /**
     * @return mixed
     */
    public function nextResult(){}

    /**
     * @param $query
     * @param float $timeout
     * @return mixed
     */
    public function prepare($query, float $timeout = null){}

    /**
     * @return mixed
     */
    public function recv(){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function begin(float $timeout = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function commit(float $timeout = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function rollback(float $timeout = null){}

    /**
     * @param string $string
     * @param $flags
     * @return mixed
     */
    public function escape(string $string, $flags = null){}

    /**
     * @return mixed
     */
    public function close(){}
}