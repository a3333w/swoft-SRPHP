<?php
namespace Swoole;

/**
 * @since 4.3.3
 */
class Timer
{


    /**
     * @param $ms [required]
     * @param mixed $callback [required]
     * @param $params [optional]
     * @return mixed
     */
    public static function tick(int $ms, $callback, array $params=null){}

    /**
     * @param $ms [required]
     * @param mixed $callback [required]
     * @param $params [optional]
     * @return mixed
     */
    public static function after(int $ms, $callback, array $params=null){}

    /**
     * @param $timer_id [required]
     * @return mixed
     */
    public static function exists(int $timer_id){}

    /**
     * @param $timer_id [required]
     * @return mixed
     */
    public static function clear(int $timer_id){}


}
