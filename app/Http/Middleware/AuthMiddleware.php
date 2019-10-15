<?php declare(strict_types=1);
/**
 *
 */

namespace App\Http\Middleware;

use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\Request;
use Swoft\Http\Server\Contract\MiddlewareInterface;
use function context;
use Swoole\Exception;

/**
 * Class FavIconMiddleware
 *
 * @Bean()
 */
class AuthMiddleware implements MiddlewareInterface
{
    /**
    /**
     * Process an incoming server request and return a response, optionally delegating
     * response creation to a handler.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Server\RequestHandlerInterface $handler
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // 角色验证开始
        //1、获得角色
        $role = $request->query('role');
        //2、正则验证请求uri是否是后台路径
        $uri = $request->getServerParams()['request_uri'];   //获得请求url
        $uriSub = substr($uri,0,7);             //截取请求url
        $rule = '/^\/?\b(' . \config('jwt.systemUserUri') .')\b\/?/'; //正则规则 '/admin/'
        $grepAdministration = grep($rule, $uriSub,0,7);           //正则匹配 helper函数
        $rule = '/^\/?\b(' .\config('jwt.userUri') . ')\b\/?/'; //正则规则 '/user/'
        $grepUser = grep($rule, $uriSub,0,6);
        $number  = stripos(substr($uri,1),'/');//获取uri中/的位置
        $moduleUri = substr($uri,1,$number);            //获得模块
        $roter= substr($uri,$number+2);                 //获得模块路由
        $config = cloneConfig(__DIR__ . '/../../../config/user'); //clone  config

        //是否是普通用户需要JWT验证的api
        if(array_key_exists($moduleUri,$config->get()['tokenapi'])){
            $tokenApi = $config->get()['tokenapi']["$moduleUri"];
            //配置文件配用户需要验证token 的路由
            $userTokenBoll = inArrayColumn($roter, $tokenApi, 'roter' );
        }else{
            $userTokenBoll = false;
        }

        /**
         * 获得token的情况
         * 情况一 管理员角色并匹配上后台路径
         * 情况二 普通角色用户匹配上个人中心 || 或者需要其他需要验证token的api
         */
        (  $grepAdministration   || ( $userTokenBoll || $grepUser )) ? $bool = 1 : $bool = 0;
        $token = getToken($request);
        if($bool){
            try {
                $auth = JWT::decode($token, \config('jwt.publicKey'), ['type' => \config('jwt.type')]);
                //角色和uri不匹配的情况抛出错误
                if(
                    ( ( $userTokenBoll || $grepUser ) && (\config('jwt.userRole') !=$auth->data->role) ) ||
                    ( $grepAdministration && (\config('jwt.systemUserRole') != $auth->data->role) )
                ){
                    throw new Exception('角色不匹配');
                }
            } catch (\Exception $e) {
                $json = ['code'=>0,'msg'=>'授权失败'];
                $response = context()->getResponse();
                return $response->withData($json);
            }
        }

        $response = $handler->handle($request);
        return $response;

    }
}
