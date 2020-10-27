<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole;

/**
 * @since 4.4.7
 */
class Event
{


    /**
     * @param int $fd
     * @param callable $read_callback
     * @param callable $write_callback
     * @param $events
     * @return mixed
     */
    public static function add(int $fd, callable $read_callback, callable $write_callback = null, $events = null){}

    /**
     * @param int $fd
     * @return mixed
     */
    public static function del(int $fd){}

    /**
     * @param int $fd
     * @param callable $read_callback
     * @param callable $write_callback
     * @param $events
     * @return mixed
     */
    public static function set(int $fd, callable $read_callback = null, callable $write_callback = null, $events = null){}

    /**
     * @param int $fd
     * @param $events
     * @return mixed
     */
    public static function isset(int $fd, $events = null){}

    /**
     * @return mixed
     */
    public static function dispatch(){}

    /**
     * @param callable $callback
     * @return mixed
     */
    public static function defer(callable $callback){}

    /**
     * @param callable $callback
     * @param $before
     * @return mixed
     */
    public static function cycle(callable $callback, $before = null){}

    /**
     * @param int $fd
     * @param mixed $data
     * @return mixed
     */
    public static function write(int $fd, $data){}

    /**
     * @return mixed
     */
    public static function wait(){}

    /**
     * @return mixed
     */
    public static function rshutdown(){}

    /**
     * @return mixed
     */
    public static function exit(){}
}