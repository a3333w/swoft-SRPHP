<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\WebSocket;

/**
 * @since 4.4.7
 */
class Frame
{

    // property of the class Frame
    public $fd;
    public $data;
    public $opcode;
    public $finish;

    /**
     * @return mixed
     */
    public function __toString(){}

    /**
     * @param mixed $data
     * @param int $opcode
     * @param bool $finish
     * @param $mask
     * @return mixed
     */
    public static function pack($data, int $opcode = null, bool $finish = null, $mask = null){}

    /**
     * @param mixed $data
     * @return mixed
     */
    public static function unpack($data){}
}