<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Http2;

/**
 * @since 4.4.7
 */
class Response
{

    // property of the class Response
    public $streamId;
    public $errCode;
    public $statusCode;
    public $pipeline;
    public $headers;
    public $set_cookie_headers;
    public $cookies;
    public $data;


}