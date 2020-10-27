<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Swoole\Coroutine;

/**
 * @since 4.4.7
 */
class Redis
{

    // property of the class Redis
    public $host;
    public $port;
    public $setting;
    public $sock;
    public $connected;
    public $errType;
    public $errCode;
    public $errMsg;

    /**
     * @param $config
     * @return mixed
     */
    public function __construct($config = null){}

    /**
     * @param string $host
     * @param int $port
     * @param $serialize
     * @return mixed
     */
    public function connect(string $host, int $port = null, $serialize = null){}

    /**
     * @return mixed
     */
    public function getAuth(){}

    /**
     * @return mixed
     */
    public function getDBNum(){}

    /**
     * @return mixed
     */
    public function getOptions(){}

    /**
     * @param array $options
     * @return mixed
     */
    public function setOptions(array $options){}

    /**
     * @return mixed
     */
    public function getDefer(){}

    /**
     * @param $defer
     * @return mixed
     */
    public function setDefer($defer){}

    /**
     * @return mixed
     */
    public function recv(){}

    /**
     * @param array $params
     * @return mixed
     */
    public function request(array $params){}

    /**
     * @return mixed
     */
    public function close(){}

    /**
     * @param string $key
     * @param $value
     * @param float $timeout
     * @param $opt
     * @return mixed
     */
    public function set(string $key, $value, float $timeout = null, $opt = null){}

    /**
     * @param string $key
     * @param int $offset
     * @param $value
     * @return mixed
     */
    public function setBit(string $key, int $offset, $value){}

    /**
     * @param string $key
     * @param $expire
     * @param $value
     * @return mixed
     */
    public function setEx(string $key, $expire, $value){}

    /**
     * @param string $key
     * @param $expire
     * @param $value
     * @return mixed
     */
    public function psetEx(string $key, $expire, $value){}

    /**
     * @param string $key
     * @param $index
     * @param $value
     * @return mixed
     */
    public function lSet(string $key, $index, $value){}

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key){}

    /**
     * @param $keys
     * @return mixed
     */
    public function mGet($keys){}

    /**
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function del(string $key, $other_keys = null){}

    /**
     * @param string $key
     * @param $member
     * @param $other_members
     * @return mixed
     */
    public function hDel(string $key, $member, $other_members = null){}

    /**
     * @param string $key
     * @param $member
     * @param $value
     * @return mixed
     */
    public function hSet(string $key, $member, $value){}

    /**
     * @param string $key
     * @param $pairs
     * @return mixed
     */
    public function hMSet(string $key, $pairs){}

    /**
     * @param string $key
     * @param $member
     * @param $value
     * @return mixed
     */
    public function hSetNx(string $key, $member, $value){}

    /**
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function delete(string $key, $other_keys = null){}

    /**
     * @param $pairs
     * @return mixed
     */
    public function mSet($pairs){}

    /**
     * @param $pairs
     * @return mixed
     */
    public function mSetNx($pairs){}

    /**
     * @param string $pattern
     * @return mixed
     */
    public function getKeys(string $pattern){}

    /**
     * @param string $pattern
     * @return mixed
     */
    public function keys(string $pattern){}

    /**
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function exists(string $key, $other_keys = null){}

    /**
     * @param string $key
     * @return mixed
     */
    public function type(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function strLen(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function lPop(string $key){}

    /**
     * @param string $key
     * @param $timeout_or_key
     * @param $extra_args
     * @return mixed
     */
    public function blPop(string $key, $timeout_or_key, $extra_args = null){}

    /**
     * @param string $key
     * @return mixed
     */
    public function rPop(string $key){}

    /**
     * @param string $key
     * @param $timeout_or_key
     * @param $extra_args
     * @return mixed
     */
    public function brPop(string $key, $timeout_or_key, $extra_args = null){}

    /**
     * @param $src
     * @param $dst
     * @param float $timeout
     * @return mixed
     */
    public function bRPopLPush($src, $dst, float $timeout){}

    /**
     * @param string $key
     * @return mixed
     */
    public function lSize(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function lLen(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function sSize(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function scard(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function sPop(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function sMembers(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function sGetMembers(string $key){}

    /**
     * @param string $key
     * @param $count
     * @return mixed
     */
    public function sRandMember(string $key, $count = null){}

    /**
     * @param string $key
     * @return mixed
     */
    public function persist(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function ttl(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function pttl(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function zCard(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function zSize(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function hLen(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function hKeys(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function hVals(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function hGetAll(string $key){}

    /**
     * @param string $key
     * @return mixed
     */
    public function debug(string $key){}

    /**
     * @param $ttl
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function restore($ttl, string $key, $value){}

    /**
     * @param string $key
     * @return mixed
     */
    public function dump(string $key){}

    /**
     * @param string $key
     * @param $newkey
     * @return mixed
     */
    public function renameKey(string $key, $newkey){}

    /**
     * @param string $key
     * @param $newkey
     * @return mixed
     */
    public function rename(string $key, $newkey){}

    /**
     * @param string $key
     * @param $newkey
     * @return mixed
     */
    public function renameNx(string $key, $newkey){}

    /**
     * @param $src
     * @param $dst
     * @return mixed
     */
    public function rpoplpush($src, $dst){}

    /**
     * @return mixed
     */
    public function randomKey(){}

    /**
     * @param string $key
     * @param $elements
     * @return mixed
     */
    public function pfadd(string $key, $elements){}

    /**
     * @param string $key
     * @return mixed
     */
    public function pfcount(string $key){}

    /**
     * @param $dstkey
     * @param $keys
     * @return mixed
     */
    public function pfmerge($dstkey, $keys){}

    /**
     * @return mixed
     */
    public function ping(){}

    /**
     * @param string $password
     * @return mixed
     */
    public function auth(string $password){}

    /**
     * @return mixed
     */
    public function unwatch(){}

    /**
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function watch(string $key, $other_keys = null){}

    /**
     * @return mixed
     */
    public function save(){}

    /**
     * @return mixed
     */
    public function bgSave(){}

    /**
     * @return mixed
     */
    public function lastSave(){}

    /**
     * @return mixed
     */
    public function flushDB(){}

    /**
     * @return mixed
     */
    public function flushAll(){}

    /**
     * @return mixed
     */
    public function dbSize(){}

    /**
     * @return mixed
     */
    public function bgrewriteaof(){}

    /**
     * @return mixed
     */
    public function time(){}

    /**
     * @return mixed
     */
    public function role(){}

    /**
     * @param string $key
     * @param int $offset
     * @param $value
     * @return mixed
     */
    public function setRange(string $key, int $offset, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function setNx(string $key, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function getSet(string $key, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function append(string $key, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function lPushx(string $key, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function lPush(string $key, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function rPush(string $key, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function rPushx(string $key, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function sContains(string $key, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function sismember(string $key, $value){}

    /**
     * @param string $key
     * @param $member
     * @return mixed
     */
    public function zScore(string $key, $member){}

    /**
     * @param string $key
     * @param $member
     * @return mixed
     */
    public function zRank(string $key, $member){}

    /**
     * @param string $key
     * @param $member
     * @return mixed
     */
    public function zRevRank(string $key, $member){}

    /**
     * @param string $key
     * @param $member
     * @return mixed
     */
    public function hGet(string $key, $member){}

    /**
     * @param string $key
     * @param $keys
     * @return mixed
     */
    public function hMGet(string $key, $keys){}

    /**
     * @param string $key
     * @param $member
     * @return mixed
     */
    public function hExists(string $key, $member){}

    /**
     * @param $channel
     * @param string $message
     * @return mixed
     */
    public function publish($channel, string $message){}

    /**
     * @param string $key
     * @param $value
     * @param $member
     * @return mixed
     */
    public function zIncrBy(string $key, $value, $member){}

    /**
     * @param string $key
     * @param $score
     * @param $value
     * @return mixed
     */
    public function zAdd(string $key, $score, $value){}

    /**
     * @param string $key
     * @param $count
     * @return mixed
     */
    public function zPopMin(string $key, $count){}

    /**
     * @param string $key
     * @param $count
     * @return mixed
     */
    public function zPopMax(string $key, $count){}

    /**
     * @param string $key
     * @param $timeout_or_key
     * @param $extra_args
     * @return mixed
     */
    public function bzPopMin(string $key, $timeout_or_key, $extra_args = null){}

    /**
     * @param string $key
     * @param $timeout_or_key
     * @param $extra_args
     * @return mixed
     */
    public function bzPopMax(string $key, $timeout_or_key, $extra_args = null){}

    /**
     * @param string $key
     * @param $min
     * @param $max
     * @return mixed
     */
    public function zDeleteRangeByScore(string $key, $min, $max){}

    /**
     * @param string $key
     * @param $min
     * @param $max
     * @return mixed
     */
    public function zRemRangeByScore(string $key, $min, $max){}

    /**
     * @param string $key
     * @param $min
     * @param $max
     * @return mixed
     */
    public function zCount(string $key, $min, $max){}

    /**
     * @param string $key
     * @param $start
     * @param $end
     * @param $scores
     * @return mixed
     */
    public function zRange(string $key, $start, $end, $scores = null){}

    /**
     * @param string $key
     * @param $start
     * @param $end
     * @param $scores
     * @return mixed
     */
    public function zRevRange(string $key, $start, $end, $scores = null){}

    /**
     * @param string $key
     * @param $start
     * @param $end
     * @param array $options
     * @return mixed
     */
    public function zRangeByScore(string $key, $start, $end, array $options = null){}

    /**
     * @param string $key
     * @param $start
     * @param $end
     * @param array $options
     * @return mixed
     */
    public function zRevRangeByScore(string $key, $start, $end, array $options = null){}

    /**
     * @param string $key
     * @param $min
     * @param $max
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function zRangeByLex(string $key, $min, $max, int $offset = null, int $limit = null){}

    /**
     * @param string $key
     * @param $min
     * @param $max
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function zRevRangeByLex(string $key, $min, $max, int $offset = null, int $limit = null){}

    /**
     * @param string $key
     * @param $keys
     * @param $weights
     * @param $aggregate
     * @return mixed
     */
    public function zInter(string $key, $keys, $weights = null, $aggregate = null){}

    /**
     * @param string $key
     * @param $keys
     * @param $weights
     * @param $aggregate
     * @return mixed
     */
    public function zinterstore(string $key, $keys, $weights = null, $aggregate = null){}

    /**
     * @param string $key
     * @param $keys
     * @param $weights
     * @param $aggregate
     * @return mixed
     */
    public function zUnion(string $key, $keys, $weights = null, $aggregate = null){}

    /**
     * @param string $key
     * @param $keys
     * @param $weights
     * @param $aggregate
     * @return mixed
     */
    public function zunionstore(string $key, $keys, $weights = null, $aggregate = null){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function incrBy(string $key, $value){}

    /**
     * @param string $key
     * @param $member
     * @param $value
     * @return mixed
     */
    public function hIncrBy(string $key, $member, $value){}

    /**
     * @param string $key
     * @return mixed
     */
    public function incr(string $key){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function decrBy(string $key, $value){}

    /**
     * @param string $key
     * @return mixed
     */
    public function decr(string $key){}

    /**
     * @param string $key
     * @param int $offset
     * @return mixed
     */
    public function getBit(string $key, int $offset){}

    /**
     * @param string $key
     * @param $position
     * @param $pivot
     * @param $value
     * @return mixed
     */
    public function lInsert(string $key, $position, $pivot, $value){}

    /**
     * @param string $key
     * @param $index
     * @return mixed
     */
    public function lGet(string $key, $index){}

    /**
     * @param string $key
     * @param $integer
     * @return mixed
     */
    public function lIndex(string $key, $integer){}

    /**
     * @param string $key
     * @param float $timeout
     * @return mixed
     */
    public function setTimeout(string $key, float $timeout){}

    /**
     * @param string $key
     * @param $integer
     * @return mixed
     */
    public function expire(string $key, $integer){}

    /**
     * @param string $key
     * @param $timestamp
     * @return mixed
     */
    public function pexpire(string $key, $timestamp){}

    /**
     * @param string $key
     * @param $timestamp
     * @return mixed
     */
    public function expireAt(string $key, $timestamp){}

    /**
     * @param string $key
     * @param $timestamp
     * @return mixed
     */
    public function pexpireAt(string $key, $timestamp){}

    /**
     * @param string $key
     * @param $dbindex
     * @return mixed
     */
    public function move(string $key, $dbindex){}

    /**
     * @param $dbindex
     * @return mixed
     */
    public function select($dbindex){}

    /**
     * @param string $key
     * @param $start
     * @param $end
     * @return mixed
     */
    public function getRange(string $key, $start, $end){}

    /**
     * @param string $key
     * @param $start
     * @param $stop
     * @return mixed
     */
    public function listTrim(string $key, $start, $stop){}

    /**
     * @param string $key
     * @param $start
     * @param $stop
     * @return mixed
     */
    public function ltrim(string $key, $start, $stop){}

    /**
     * @param string $key
     * @param $start
     * @param $end
     * @return mixed
     */
    public function lGetRange(string $key, $start, $end){}

    /**
     * @param string $key
     * @param $start
     * @param $end
     * @return mixed
     */
    public function lRange(string $key, $start, $end){}

    /**
     * @param string $key
     * @param $value
     * @param $count
     * @return mixed
     */
    public function lRem(string $key, $value, $count){}

    /**
     * @param string $key
     * @param $value
     * @param $count
     * @return mixed
     */
    public function lRemove(string $key, $value, $count){}

    /**
     * @param string $key
     * @param $start
     * @param $end
     * @return mixed
     */
    public function zDeleteRangeByRank(string $key, $start, $end){}

    /**
     * @param string $key
     * @param $min
     * @param $max
     * @return mixed
     */
    public function zRemRangeByRank(string $key, $min, $max){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function incrByFloat(string $key, $value){}

    /**
     * @param string $key
     * @param $member
     * @param $value
     * @return mixed
     */
    public function hIncrByFloat(string $key, $member, $value){}

    /**
     * @param string $key
     * @return mixed
     */
    public function bitCount(string $key){}

    /**
     * @param $operation
     * @param $ret_key
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function bitOp($operation, $ret_key, string $key, $other_keys = null){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function sAdd(string $key, $value){}

    /**
     * @param $src
     * @param $dst
     * @param $value
     * @return mixed
     */
    public function sMove($src, $dst, $value){}

    /**
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function sDiff(string $key, $other_keys = null){}

    /**
     * @param $dst
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function sDiffStore($dst, string $key, $other_keys = null){}

    /**
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function sUnion(string $key, $other_keys = null){}

    /**
     * @param $dst
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function sUnionStore($dst, string $key, $other_keys = null){}

    /**
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function sInter(string $key, $other_keys = null){}

    /**
     * @param $dst
     * @param string $key
     * @param $other_keys
     * @return mixed
     */
    public function sInterStore($dst, string $key, $other_keys = null){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function sRemove(string $key, $value){}

    /**
     * @param string $key
     * @param $value
     * @return mixed
     */
    public function srem(string $key, $value){}

    /**
     * @param string $key
     * @param $member
     * @param $other_members
     * @return mixed
     */
    public function zDelete(string $key, $member, $other_members = null){}

    /**
     * @param string $key
     * @param $member
     * @param $other_members
     * @return mixed
     */
    public function zRemove(string $key, $member, $other_members = null){}

    /**
     * @param string $key
     * @param $member
     * @param $other_members
     * @return mixed
     */
    public function zRem(string $key, $member, $other_members = null){}

    /**
     * @param $patterns
     * @return mixed
     */
    public function pSubscribe($patterns){}

    /**
     * @param $channels
     * @return mixed
     */
    public function subscribe($channels){}

    /**
     * @param $channels
     * @return mixed
     */
    public function unsubscribe($channels){}

    /**
     * @param $patterns
     * @return mixed
     */
    public function pUnSubscribe($patterns){}

    /**
     * @return mixed
     */
    public function multi(){}

    /**
     * @return mixed
     */
    public function exec(){}

    /**
     * @param $script
     * @param $args
     * @param $num_keys
     * @return mixed
     */
    public function eval($script, $args = null, $num_keys = null){}

    /**
     * @param $script_sha
     * @param $args
     * @param $num_keys
     * @return mixed
     */
    public function evalSha($script_sha, $args = null, $num_keys = null){}

    /**
     * @param $cmd
     * @param $args
     * @return mixed
     */
    public function script($cmd, $args = null){}
}