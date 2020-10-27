<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Server;

/**
 * @since 4.4.7
 */
class Task
{

    // property of the class Task
    public $data;
    public $id;
    public $worker_id;
    public $flags;

    /**
     * @param mixed $data
     * @return mixed
     */
    public function finish($data){}
}