<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole;

/**
 * @since 4.4.7
 */
class Timer
{


    /**
     * @param array $settings
     * @return mixed
     */
    public static function set(array $settings){}

    /**
     * @param int $ms
     * @param callable $callback
     * @param ...$params
     * @return mixed
     */
    public static function tick(int $ms, callable $callback, ...$params){}

    /**
     * @param int $ms
     * @param callable $callback
     * @param ...$params
     * @return mixed
     */
    public static function after(int $ms, callable $callback, ...$params){}

    /**
     * @param int $timer_id
     * @return mixed
     */
    public static function exists(int $timer_id){}

    /**
     * @param int $timer_id
     * @return mixed
     */
    public static function info(int $timer_id){}

    /**
     * @return mixed
     */
    public static function stats(){}

    /**
     * @return mixed
     */
    public static function list(){}

    /**
     * @param int $timer_id
     * @return mixed
     */
    public static function clear(int $timer_id){}

    /**
     * @return mixed
     */
    public static function clearAll(){}
}