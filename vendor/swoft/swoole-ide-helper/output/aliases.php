<?php /** @noinspection ALL - For disable PhpStorm check */

namespace Co
{
    class Iterator extends \Swoole\Coroutine\Iterator{}
    class Context extends \Swoole\Coroutine\Context{}
    class System extends \Swoole\Coroutine\System{}
    class Scheduler extends \Swoole\Coroutine\Scheduler{}
    class Channel extends \Swoole\Coroutine\Channel{}
    class Socket extends \Swoole\Coroutine\Socket{}
    class Client extends \Swoole\Coroutine\Client{}
    class Mysql extends \Swoole\Coroutine\Mysql{}
    class Redis extends \Swoole\Coroutine\Redis{}
}

namespace Co\Socket
{
    class Exception extends \Swoole\Coroutine\Socket\Exception{}
}

namespace Co\Http
{
    class Client extends \Swoole\Coroutine\Http\Client{}
    class Server extends \Swoole\Coroutine\Http\Server{}
}

namespace Co\Http\Client
{
    class Exception extends \Swoole\Coroutine\Http\Client\Exception{}
}

namespace Co\Mysql
{
    class Statement extends \Swoole\Coroutine\Mysql\Statement{}
    class Exception extends \Swoole\Coroutine\Mysql\Exception{}
}

namespace Co\Http2
{
    class Client extends \Swoole\Coroutine\Http2\Client{}
}

namespace Co\Http2\Client
{
    class Exception extends \Swoole\Coroutine\Http2\Client\Exception{}
}

