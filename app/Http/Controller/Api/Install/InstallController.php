<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller\Api\Install;

use Swoft;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;
use function context;

/**
 * Class HomeController
 * @Controller()
 */
class InstallController
{
    /**
     * @RequestMapping("/")
     * @throws Throwable
     */
    public function index(): Response
    {
        /** @var Renderer $renderer */
        $renderer = Swoft::getBean('view');
        $content  = $renderer->render('home/index');

        return context()->getResponse()->withContentType(ContentType::HTML)->withContent($content);
    }

    /**
     * @RequestMapping("/install")
     * @throws Throwable
     */
    public function install(): Response
    {
        /** @var Renderer $renderer */
        $renderer = Swoft::getBean('view');
        $content  = $renderer->render('home/install');

        return context()->getResponse()->withContentType(ContentType::HTML)->withContent($content);
    }

    /**
     * @RequestMapping("/installpost")
     *
     * @return Response
     * @throws SwoftException
     */
    public function installpost(Request $request)
    {
        $ip = $request->Post('ip');
        $dbname = $request->Post('dbname');
        $username = $request->Post('username');
        $passwd = $request->Post('passwd');

        $str = <<<Eof
<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
use App\Common\DbSelector;
use App\Process\MonitorProcess;
use Swoft\Crontab\Process\CrontabProcess;
use Swoft\Db\Pool;
use Swoft\Http\Server\HttpServer;
use Swoft\Task\Swoole\SyncTaskListener;
use Swoft\Task\Swoole\TaskListener;
use Swoft\Task\Swoole\FinishListener;
use Swoft\Rpc\Client\Client as ServiceClient;
use Swoft\Rpc\Client\Pool as ServicePool;
use Swoft\Rpc\Server\ServiceServer;
use Swoft\Http\Server\Swoole\RequestListener;
use Swoft\WebSocket\Server\WebSocketServer;
use Swoft\Server\SwooleEvent;
use Swoft\Db\Database;
use Swoft\Redis\RedisDb;

return [
    'noticeHandler'      => [
        'logFile' => '@runtime/logs/notice-%d{Y-m-d-H}.log',
    ],
    'applicationHandler' => [
        'logFile' => '@runtime/logs/error-%d{Y-m-d}.log',
    ],
    'logger'            => [
        'flushRequest' => false,
        'enable'       => false,
        'json'         => false,
    ],
    'httpServer'        => [
        'class'    => HttpServer::class,
        'port'     => 18306,
        'listener' => [
            'rpc' => bean('rpcServer')
        ],
        'process'  => [
//            'monitor' => bean(MonitorProcess::class)
//            'crontab' => bean(CrontabProcess::class)
        ],
        'on'       => [
//            SwooleEvent::TASK   => bean(SyncTaskListener::class),  // Enable sync task
            SwooleEvent::TASK   => bean(TaskListener::class),  // Enable task must task and finish event
            SwooleEvent::FINISH => bean(FinishListener::class)
        ],
        /* @see HttpServer::\$setting */
        'setting' => [
            'task_worker_num'       => 12,
            'task_enable_coroutine' => true,
            'worker_num'            => 6
        ]
    ],
    'httpDispatcher'    => [
        // Add global http middleware
        'middlewares'      => [
            \App\Http\Middleware\FavIconMiddleware::class,
            \App\Http\Middleware\VerifyMiddleware::class,
            \App\Http\Middleware\AuthMiddleware::class,
            \App\Http\Middleware\MenuMiddleware::class,
            // \Swoft\Whoops\WhoopsMiddleware::class,
            // Allow use @View tag
            \Swoft\View\Middleware\ViewMiddleware::class,

        ],
        'afterMiddlewares' => [
            \Swoft\Http\Server\Middleware\ValidatorMiddleware::class
        ]
    ],
    'db'                => [
        'class'    => Database::class,
        'dsn'      => 'mysql:dbname=$dbname;host=$ip',
        'username' => '$username',
        'password' => '$passwd',
    ],
    'db2'               => [
        'class'      => Database::class,
        'dsn'        => 'mysql:dbname=test2;host=127.0.0.1',
        'username'   => 'root',
        'password'   => 'swoft123456',
//        'dbSelector' => bean(DbSelector::class)
    ],
    'db2.pool' => [
        'class'    => Pool::class,
        'database' => bean('db2'),
    ],
    'db3'               => [
        'class'    => Database::class,
        'dsn'      => 'mysql:dbname=test2;host=127.0.0.1',
        'username' => 'root',
        'password' => 'swoft123456'
    ],
    'db3.pool'          => [
        'class'    => Pool::class,
        'database' => bean('db3')
    ],
    'migrationManager'  => [
        'migrationPath' => '@database/Migration',
    ],
    'redis'             => [
        'class'    => RedisDb::class,
        'host'     => '127.0.0.1',
        'port'     => 6379,
        'database' => 0,
        'option'   => [
            'prefix' => 'swoft:'
        ]
    ],
    'user'              => [
        'class'   => ServiceClient::class,
        'host'    => '127.0.0.1',
        'port'    => 18307,
        'setting' => [
            'timeout'         => 0.5,
            'connect_timeout' => 1.0,
            'write_timeout'   => 10.0,
            'read_timeout'    => 0.5,
        ],
        'packet'  => bean('rpcClientPacket')
    ],
    'user.pool'         => [
        'class'  => ServicePool::class,
        'client' => bean('user'),
    ],
    'rpcServer'         => [
        'class' => ServiceServer::class,
    ],
    'wsServer'          => [
        'class'   => WebSocketServer::class,
        'port'    => 18308,
        'on'      => [
            // Enable http handle
            SwooleEvent::REQUEST => bean(RequestListener::class),
        ],
        'debug'   => 1,
        // 'debug'   => env('SWOFT_DEBUG', 0),
        /* @see WebSocketServer::\$setting */
        'setting' => [
            'log_file' => alias('@runtime/swoole.log'),
        ],
    ],
    'tcpServer'         => [
        'port'  => 18309,
        'debug' => 1,
    ],
    /** @see \Swoft\Tcp\Protocol */
    'tcpServerProtocol' => [
        // 'type'            => \Swoft\Tcp\Packer\JsonPacker::TYPE,
        'type' => \Swoft\Tcp\Packer\SimpleTokenPacker::TYPE,
        // 'openLengthCheck' => true,
    ],
    'cliRouter'         => [
        // 'disabledGroups' => ['demo', 'test'],
    ]
];

Eof;
        $myfile = fopen(strval(env('SWOFT_PATH')).'/app/bean.php', 'w');
        $txt = $str;
        fwrite($myfile, $txt);
        fclose($myfile);

        $con = strval(env('SWOFT_PATH')) . '/app/InstallDb/';
        $filename = scandir($con);
        $conname = array();
        foreach($filename as $k=>$v){
            if($v=="." || $v==".."){continue;}
            $conname[] = $v;
        }
        $mysqli = new \mysqli($ip, $username, $passwd, $dbname);
        $mysqli->query("set names 'utf8'");
        if(!$mysqli) {
            return context()->getResponse()->withContent('error');
        }else{
            foreach ($conname as $key => $value){
                $sql_array = preg_split("/;[\r\n]+/", file_get_contents($con.$value));
                foreach ($sql_array as $k => $v) {
                    $result = $mysqli->query($v);
                    if ($result) {
                        echo "Query OK<br/>";
                    } else {
                        echo $mysqli->error() . '<br>';
                        $mysqli->close();
                        return context()->getResponse()->withContent('失败了，请输入返回正确输入');
                    }
                }
            }
        }
        return context()->getResponse()->withContent('成功了，请查看数据库是否生成');
    }

    /**
     * @RequestMapping("/hello[/{name}]")
     * @param string $name
     *
     * @return Response
     * @throws SwoftException
     */
    public function hello(string $name): Response
    {
        return context()->getResponse()->withContent('Hello' . ($name === '' ? '' : ", {$name}"));
    }
}
