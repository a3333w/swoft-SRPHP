<?php declare(strict_types=1);

namespace App\Model\Logic\System\V1\Information;


use Firebase\JWT\JWT;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;

/**
 * Class InformationLogicClass
 * @since 2.0
 * @Bean(name="information", scope=Bean::PROTOTYPE)
 */
class InformationLogic
{
    /**
     * 获得系统信息
     * @param $response
     * @param $request
     */
    public function __invoke(Response $response,Request $request)
    {
        $mysqlVersion = DB::select('select version()');
        $token = getToken($request);
        $auth = JWT::decode($token, config('jwt.publicKey'), ['type' =>  \config('jwt.type')]);
        //组模块信息
        $configModules = config('module');
        $configModules = array_flip($configModules);
        $modules = [];
        foreach ($auth->data->modules as $key => $value){
            if(array_key_exists($value, $configModules)){
                $modules[$configModules[$value]] = $value;
            }
        }
        //返回账户信息
        return [
            'role_id'=> $auth->data->role_id,
            'auth'   => $auth->data->auth,
            'roleAuth' => json_decode($auth->data->roleAuth),
            'nike'   => $auth->data->nike,
            'role'   => $auth->data->role,
            'systemVersion' => env('SYSTEM_VERSION'),
            'httpHost' => env('HTTP_HOST'),
            'uname'    => php_uname('a'),
            'webServer' => 'swoole-http-server',
            'mysqlVersion' => substr($mysqlVersion[0]['version()'],0,6),
            'phpVersion' => PHP_VERSION,
            'upSize'      => env('PACKAGE_MAX_LENGTH'),
            'max_execution_time' => ($max = ini_get('max_execution_time') == 0)? "不限制" : $max ,
            'free_space'  => getSize(disk_free_space('/')),
            'modules'     => $modules,
        ];
    }
}