<?php
namespace Swoole;

/**
 * @since 4.3.3
 */
class Coroutine
{


    /**
     * @param $func [required]
     * @param $params [optional]
     * @return mixed
     */
    public static function create($func, array $params=null){}

    /**
     * @param $command [required]
     * @param $get_error_stream [optional]
     * @return mixed
     */
    public static function exec(string $command, $get_error_stream=null){}

    /**
     * @param $domain_name [required]
     * @param $family [optional]
     * @param $timeout [optional]
     * @return mixed
     */
    public static function gethostbyname(string $domain_name, $family=null, float $timeout=null){}

    /**
     * @param mixed $callback [required]
     * @return mixed
     */
    public static function defer($callback){}

    /**
     * @param $options [required]
     * @return mixed
     */
    public static function set($options){}

    /**
     * @param $cid [required]
     * @return mixed
     */
    public static function exists(int $cid){}

    /**
     * @return mixed
     */
    public static function yield(){}

    /**
     * @return mixed
     */
    public static function suspend(){}

    /**
     * @param $cid [required]
     * @return mixed
     */
    public static function resume(int $cid){}

    /**
     * @return mixed
     */
    public static function stats(){}

    /**
     * @return mixed
     */
    public static function getCid(){}

    /**
     * @return mixed
     */
    public static function getuid(){}

    /**
     * @return mixed
     */
    public static function getPcid(){}

    /**
     * @param $cid [optional]
     * @return mixed
     */
    public static function getContext(int $cid=null){}

    /**
     * @param $seconds [required]
     * @return mixed
     */
    public static function sleep($seconds){}

    /**
     * @param $handle [required]
     * @param $length [optional]
     * @return mixed
     */
    public static function fread($handle, int $length=null){}

    /**
     * @param $handle [required]
     * @return mixed
     */
    public static function fgets($handle){}

    /**
     * @param $handle [required]
     * @param $string [required]
     * @param $length [optional]
     * @return mixed
     */
    public static function fwrite($handle, string $string, int $length=null){}

    /**
     * @param $filename [required]
     * @return mixed
     */
    public static function readFile(string $filename){}

    /**
     * @param $filename [required]
     * @param $data [required]
     * @param $flags [optional]
     * @return mixed
     */
    public static function writeFile(string $filename, $data, $flags=null){}

    /**
     * @param $hostname [required]
     * @param $family [optional]
     * @param $socktype [optional]
     * @param $protocol [optional]
     * @param $service [optional]
     * @return mixed
     */
    public static function getaddrinfo(string $hostname, $family=null, $socktype=null, $protocol=null, $service=null){}

    /**
     * @param $path [required]
     * @return mixed
     */
    public static function statvfs(string $path){}

    /**
     * @param $cid [optional]
     * @param $options [optional]
     * @param $limit [optional]
     * @return mixed
     */
    public static function getBackTrace(int $cid=null, $options=null, int $limit=null){}

    /**
     * @return mixed
     */
    public static function list(){}

    /**
     * @return mixed
     */
    public static function listCoroutines(){}


}
