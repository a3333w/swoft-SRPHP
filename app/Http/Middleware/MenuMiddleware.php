<?php
namespace App\Http\Middleware;

use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Context\Context;
use Swoft\Http\Server\Contract\MiddlewareInterface;
/**
* @Bean()
*/
class MenuMiddleware implements MiddlewareInterface
{

    /**
     * Process an incoming server request.
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     *
     * @return ResponseInterface
     * @inheritdoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $uri = $request->getServerParams()['request_uri'];   //获得请求url
        $uriSub = substr($uri,0,7);             //截取请求url
        $rule = '/^\/?\b(' . \config('jwt.systemUserUri') .')\b\/?/'; //正则规则 '/admin/'
        $grepAdministration = grep($rule, $uriSub,0,7);           //正则匹配 helper函数
        if($grepAdministration){
            $checkUri = mb_substr($uri,7);
            $data = checkUri($checkUri);
            $token = getToken($request);
            $auth = JWT::decode($token, config('jwt.publicKey'), ['type' =>  \config('jwt.type')]);
            $authArr = $auth->data->roleAuth;
            $bool = in_array($data['id'],json_decode($authArr));
            if($bool == false){
                $json = ['code'=>0,'msg'=>'缺少权限'];
                $response = Context::mustGet()->getResponse();
                return $response->withData($json);
            }
        }

        $response = $handler->handle($request);
        return $response;
    }


}