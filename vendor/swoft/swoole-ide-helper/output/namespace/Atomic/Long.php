<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Atomic;

/**
 * @since 4.4.7
 */
class Long
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
     * @param $cmp_value
     * @param $new_value
     * @return mixed
     */
    public function cmpset($cmp_value, $new_value){}
}