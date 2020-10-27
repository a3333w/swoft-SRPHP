<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine;

/**
 * @since 4.4.7
 */
class System
{


    /**
     * @param string $domain_name
     * @param $family
     * @param float $timeout
     * @return mixed
     */
    public static function gethostbyname(string $domain_name, $family = null, float $timeout = null){}

    /**
     * @param string $domain_name
     * @param float $timeout
     * @return mixed
     */
    public static function dnsLookup(string $domain_name, float $timeout = null){}

    /**
     * @param string $command
     * @param $get_error_stream
     * @return mixed
     */
    public static function exec(string $command, $get_error_stream = null){}

    /**
     * @param $seconds
     * @return mixed
     */
    public static function sleep($seconds){}

    /**
     * @param $handle
     * @param int $length
     * @return mixed
     */
    public static function fread($handle, int $length = null){}

    /**
     * @param $handle
     * @param string $string
     * @param int $length
     * @return mixed
     */
    public static function fwrite($handle, string $string, int $length = null){}

    /**
     * @param $handle
     * @return mixed
     */
    public static function fgets($handle){}

    /**
     * @param string $hostname
     * @param $family
     * @param $socktype
     * @param $protocol
     * @param $service
     * @param float $timeout
     * @return mixed
     */
    public static function getaddrinfo(string $hostname, $family = null, $socktype = null, $protocol = null, $service = null, float $timeout = null){}

    /**
     * @param string $filename
     * @return mixed
     */
    public static function readFile(string $filename){}

    /**
     * @param string $filename
     * @param mixed $data
     * @param $flags
     * @return mixed
     */
    public static function writeFile(string $filename, $data, $flags = null){}

    /**
     * @param string $path
     * @return mixed
     */
    public static function statvfs(string $path){}
}