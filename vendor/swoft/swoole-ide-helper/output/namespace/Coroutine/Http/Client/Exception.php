<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine\Http\Client;

/**
 * @since 4.4.7
 */
class Exception extends \Swoole\Exception implements \Throwable
{

    // property of the class Exception
    protected $message;
    protected $code;
    protected $file;
    protected $line;

    /**
     * @param string $message
     * @param $code
     * @param $previous
     * @return mixed
     */
    public function __construct(string $message = null, $code = null, $previous = null){}

    /**
     * @return mixed
     */
    public function __wakeup(){}

    /**
     * @return mixed
     */
    public function __toString(){}
}