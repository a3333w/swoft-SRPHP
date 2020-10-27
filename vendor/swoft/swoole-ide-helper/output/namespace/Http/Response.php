<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Http;

/**
 * @since 4.4.7
 */
class Response
{

    // property of the class Response
    public $fd;
    public $socket;
    public $header;
    public $cookie;
    public $trailer;

    /**
     * @return mixed
     */
    public function initHeader(){}

    /**
     * @param string $name
     * @param $value
     * @param $expires
     * @param string $path
     * @param string $domain
     * @param $secure
     * @param $httponly
     * @param $samesite
     * @return mixed
     */
    public function cookie(string $name, $value = null, $expires = null, string $path = null, string $domain = null, $secure = null, $httponly = null, $samesite = null){}

    /**
     * @param string $name
     * @param $value
     * @param $expires
     * @param string $path
     * @param string $domain
     * @param $secure
     * @param $httponly
     * @param $samesite
     * @return mixed
     */
    public function setCookie(string $name, $value = null, $expires = null, string $path = null, string $domain = null, $secure = null, $httponly = null, $samesite = null){}

    /**
     * @param string $name
     * @param $value
     * @param $expires
     * @param string $path
     * @param string $domain
     * @param $secure
     * @param $httponly
     * @param $samesite
     * @return mixed
     */
    public function rawcookie(string $name, $value = null, $expires = null, string $path = null, string $domain = null, $secure = null, $httponly = null, $samesite = null){}

    /**
     * @param int $http_code
     * @param string $reason
     * @return mixed
     */
    public function status(int $http_code, string $reason = null){}

    /**
     * @param int $http_code
     * @param string $reason
     * @return mixed
     */
    public function setStatusCode(int $http_code, string $reason = null){}

    /**
     * @param string $key
     * @param $value
     * @param $ucwords
     * @return mixed
     */
    public function header(string $key, $value, $ucwords = null){}

    /**
     * @param string $key
     * @param $value
     * @param $ucwords
     * @return mixed
     */
    public function setHeader(string $key, $value, $ucwords = null){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function trailer(string $key, $value){}

    /**
     * @return mixed
     */
    public function ping(){}

    /**
     * @param string $content
     * @return mixed
     */
    public function write(string $content){}

    /**
     * @param string $content
     * @return mixed
     */
    public function end(string $content = null){}

    /**
     * @param string $filename
     * @param int $offset
     * @param int $length
     * @return mixed
     */
    public function sendfile(string $filename, int $offset = null, int $length = null){}

    /**
     * @param string $location
     * @param int $http_code
     * @return mixed
     */
    public function redirect(string $location, int $http_code = null){}

    /**
     * @return mixed
     */
    public function detach(){}

    /**
     * @param int $fd
     * @return mixed
     */
    public static function create(int $fd){}

    /**
     * @return mixed
     */
    public function upgrade(){}

    /**
     * @return mixed
     */
    public function push(){}

    /**
     * @return mixed
     */
    public function recv(){}
}