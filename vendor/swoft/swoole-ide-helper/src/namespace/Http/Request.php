<?php
namespace Swoole\Http;

/**
 * @since 4.3.3
 */
class Request
{

    public $fd;
    public $streamId;
    public $header;
    public $server;
    public $request;
    public $cookie;
    public $get;
    public $files;
    public $post;
    public $tmpfiles;

    /**
     * @return mixed
     */
    public function rawContent(){}

    /**
     * @return mixed
     */
    public function getData(){}

    /**
     * @return mixed
     */
    public function __destruct(){}


}
