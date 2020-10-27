<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Curl;

/**
 * @since 4.4.7
 */
class Handler
{
    // constants of the class Handler
    public const ERRORS = array (
  3 => 'No URL set!',
);

    // property of the class Handler
    public $returnTransfer;
    public $method;
    public $headers;
    public $transfer;
    public $errCode;
    public $errMsg;

    /**
     * @param $url
     * @return mixed
     */
    public function __construct($url = null){}

    /**
     * @return mixed
     */
    public function execute(){}

    /**
     * @return mixed
     */
    public function close(){}

    /**
     * @param int $opt
     * @param $value
     * @return mixed
     */
    public function setOption(int $opt, $value){}

    /**
     * @return mixed
     */
    public function reset(){}

    /**
     * @return mixed
     */
    public function getInfo(){}
}