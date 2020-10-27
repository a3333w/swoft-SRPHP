<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine\MySQL;

/**
 * @since 4.4.7
 */
class Statement
{

    // property of the class Statement
    public $id;
    public $affected_rows;
    public $insert_id;
    public $error;
    public $errno;

    /**
     * @param array $params
     * @param float $timeout
     * @return mixed
     */
    public function execute(array $params = null, float $timeout = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function fetch(float $timeout = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function fetchAll(float $timeout = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function nextResult(float $timeout = null){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function recv(float $timeout = null){}

    /**
     * @return mixed
     */
    public function close(){}
}