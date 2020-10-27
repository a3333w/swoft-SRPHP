<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine;

/**
 * @since 4.4.7
 */
class Context extends \ArrayObject implements \Countable, \Serializable, \ArrayAccess, \IteratorAggregate
{
    // constants of the class Context
    public const STD_PROP_LIST = 1;
    public const ARRAY_AS_PROPS = 2;


    /**
     * @param $input
     * @param $flags
     * @param string $iterator_class
     * @return mixed
     */
    public function __construct($input = null, $flags = null, string $iterator_class = null){}

    /**
     * @param $index
     * @return mixed
     */
    public function offsetExists($index){}

    /**
     * @param $index
     * @return mixed
     */
    public function offsetGet($index){}

    /**
     * @param $index
     * @param $newval
     * @return mixed
     */
    public function offsetSet($index, $newval){}

    /**
     * @param $index
     * @return mixed
     */
    public function offsetUnset($index){}

    /**
     * @param $value
     * @return mixed
     */
    public function append($value){}

    /**
     * @return mixed
     */
    public function getArrayCopy(){}

    /**
     * @return mixed
     */
    public function count(){}

    /**
     * @return mixed
     */
    public function getFlags(){}

    /**
     * @param $flags
     * @return mixed
     */
    public function setFlags($flags){}

    /**
     * @return mixed
     */
    public function asort(){}

    /**
     * @return mixed
     */
    public function ksort(){}

    /**
     * @param mixed $cmp_function
     * @return mixed
     */
    public function uasort($cmp_function){}

    /**
     * @param mixed $cmp_function
     * @return mixed
     */
    public function uksort($cmp_function){}

    /**
     * @return mixed
     */
    public function natsort(){}

    /**
     * @return mixed
     */
    public function natcasesort(){}

    /**
     * @param $serialized
     * @return mixed
     */
    public function unserialize($serialized){}

    /**
     * @return mixed
     */
    public function serialize(){}

    /**
     * @return mixed
     */
    public function getIterator(){}

    /**
     * @param $array
     * @return mixed
     */
    public function exchangeArray($array){}

    /**
     * @param $iteratorClass
     * @return mixed
     */
    public function setIteratorClass($iteratorClass){}

    /**
     * @return mixed
     */
    public function getIteratorClass(){}
}