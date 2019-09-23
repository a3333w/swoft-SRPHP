<?php
function swoole_version(){}

function swoole_cpu_num(){}

function swoole_last_error(){}

/**
 * @param $fd [required]
 * @param $read_callback [required]
 * @param $write_callback [optional]
 * @param $events [optional]
 * @return mixed
 */
function swoole_event_add(int $fd, $read_callback, $write_callback=null, $events=null){}

/**
 * @param $fd [required]
 * @param $read_callback [optional]
 * @param $write_callback [optional]
 * @param $events [optional]
 * @return mixed
 */
function swoole_event_set(int $fd, $read_callback=null, $write_callback=null, $events=null){}

/**
 * @param $fd [required]
 * @return mixed
 */
function swoole_event_del(int $fd){}

function swoole_event_exit(){}

function swoole_event_wait(){}

/**
 * @param $fd [required]
 * @param $data [required]
 * @return mixed
 */
function swoole_event_write(int $fd, $data){}

/**
 * @param mixed $callback [required]
 * @return mixed
 */
function swoole_event_defer($callback){}

/**
 * @param mixed $callback [required]
 * @param $before [optional]
 * @return mixed
 */
function swoole_event_cycle($callback, $before=null){}

function swoole_event_dispatch(){}

/**
 * @param $fd [required]
 * @param $events [optional]
 * @return mixed
 */
function swoole_event_isset(int $fd, $events=null){}

/**
 * @param $ms [required]
 * @param mixed $callback [required]
 * @param $params [optional]
 * @return mixed
 */
function swoole_timer_after(int $ms, $callback, array $params=null){}

/**
 * @param $ms [required]
 * @param mixed $callback [required]
 * @param $params [optional]
 * @return mixed
 */
function swoole_timer_tick(int $ms, $callback, array $params=null){}

/**
 * @param $timer_id [required]
 * @return mixed
 */
function swoole_timer_exists(int $timer_id){}

/**
 * @param $timer_id [required]
 * @return mixed
 */
function swoole_timer_clear(int $timer_id){}

/**
 * @param $domain_name [required]
 * @param $timeout [optional]
 * @return mixed
 */
function swoole_async_dns_lookup_coro(string $domain_name, float $timeout=null){}

/**
 * @param $settings [required]
 * @return mixed
 */
function swoole_async_set(array $settings){}

/**
 * @param $func [required]
 * @param $params [optional]
 * @return mixed
 */
function swoole_coroutine_create($func, array $params=null){}

/**
 * @param $command [required]
 * @return mixed
 */
function swoole_coroutine_exec(string $command){}

/**
 * @param mixed $callback [required]
 * @return mixed
 */
function swoole_coroutine_defer($callback){}

/**
 * @param $func [required]
 * @param $params [optional]
 * @return mixed
 */
function go($func, array $params=null){}

/**
 * @param mixed $callback [required]
 * @return mixed
 */
function defer($callback){}

/**
 * @param $read_array [required]
 * @param $write_array [required]
 * @param $error_array [required]
 * @param $timeout [optional]
 * @return mixed
 */
function swoole_client_select(array $read_array, array $write_array, array $error_array, float $timeout=null){}

/**
 * @param $read_array [required]
 * @param $write_array [required]
 * @param $error_array [required]
 * @param $timeout [optional]
 * @return mixed
 */
function swoole_select(array $read_array, array $write_array, array $error_array, float $timeout=null){}

/**
 * @param $process_name [required]
 * @return mixed
 */
function swoole_set_process_name(string $process_name){}

function swoole_get_local_ip(){}

function swoole_get_local_mac(){}

/**
 * @param $errno [required]
 * @param $error_type [optional]
 * @return mixed
 */
function swoole_strerror($errno, $error_type=null){}

function swoole_errno(){}

/**
 * @param $data [required]
 * @param $type [optional]
 * @return mixed
 */
function swoole_hashcode($data, $type=null){}

/**
 * @param $filename [required]
 * @return mixed
 */
function swoole_get_mime_type(string $filename){}

function swoole_clear_dns_cache(){}

function swoole_internal_call_user_shutdown_begin(){}

