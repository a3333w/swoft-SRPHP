<?php
namespace Swoole\Coroutine;

/**
 * @since 4.3.3
 */
class Channel
{

    public $capacity;
    public $errCode;

    /**
     * @param $size [optional]
     * @return mixed
     */
    public function __construct(int $size=null){}

    /**
     * @param $data [required]
     * @param $timeout [optional]
     * @return mixed
     */
    public function push($data, float $timeout=null){}

    /**
     * @param $timeout [optional]
     * @return mixed
     */
    public function pop(float $timeout=null){}

    /**
     * @return mixed
     */
    public function isEmpty(){}

    /**
     * @return mixed
     */
    public function isFull(){}

    /**
     * @return mixed
     */
    public function close(){}

    /**
     * @return mixed
     */
    public function stats(){}

    /**
     * @return mixed
     */
    public function length(){}


}
