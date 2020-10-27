<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole;

/**
 * @since 4.4.7
 */
class Atomic
{


    /**
     * @param $value
     * @return mixed
     */
    public function __construct($value = null){}

    /**
     * @param $add_value
     * @return mixed
     */
    public function add($add_value = null){}

    /**
     * @param $sub_value
     * @return mixed
     */
    public function sub($sub_value = null){}

    /**
     * @return mixed
     */
    public function get(){}

    /**
     * @param $value
     * @return mixed
     */
    public function set($value){}

    /**
     * @param float $timeout
     * @return mixed
     */
    public function wait(float $timeout = null){}

    /**
     * @param $count
     * @return mixed
     */
    public function wakeup($count = null){}

    /**
     * @param $cmp_value
     * @param $new_value
     * @return mixed
     */
    public function cmpset($cmp_value, $new_value){}
}