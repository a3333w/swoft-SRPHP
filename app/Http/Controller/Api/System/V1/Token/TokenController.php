<?php declare(strict_types=1);

namespace App\Http\Controller\Api\System\V1\Token;

use App\Utils\Message;
use App\Utils\Sms\SendSms;
use Firebase\JWT\JWT;
use ReflectionException;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Context\Context;
use Swoft\Db\DB;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Redis\Redis;
use Swoft\Validator\Annotation\Mapping\Validate;
use Swoole\Exception;

/**

 * Class TokenController
 * @since 2.0
 *
 * @Controller(prefix="/token")
 */
class TokenController
{
    /**
     * 管理员用户和普通用户获取token
     * @RequestMapping(route="gettoken")
     * @param Response $response
     * @param Request $request
     */
    public function getToken(Response $response,Request $request)
    {
        $role = $request->query('role');
        //jwt 荷载中的过期时间   按role角色决定
        ($role == 'admin')? $exp = \config('jwt.systemExp') : $exp = config('jwt.userExp');
        $data = $request->input()['input'];
        $where = array(
            "username" =>$data['username'],
            "password" => md5($data['password']),
        );
        DB::beginTransaction();
        //if管理员角色 else 普通角色
        if($role == config('role')['Administration']){
            $user = psf()->call(
                "Token.AdminData::systemUser",
                [
                    $where,
                    [
                        'id',
                        'username',
                        'password',
                        'role_id',
                        'auth',
                        'nike'
                    ]
                ]
            )->getResult();

            $where = [
                'id'=>$user['role_id']
            ];
            //获得角色权限
            $userAuth = psf()->call(
                "Role.RoleData::editFind",
                [
                    $where,
                    [
                        'username',
                        'password',
                        'role_id',
                        'auth',
                        'nike'
                    ]
                ]
            )->getResult();

            //获得角色权限对应的模块
            $userModule = psf()->call(
                "Menu.MenuData::getMenuByid",
                [
                    json_decode($userAuth['auth']),['module'],true
                ]
            )->getResult();
            //角色下对应的模块不为空,将模块组为一个数组
            if(!empty($userModule)){
                $modules = [];
                foreach ($userModule as $key => $value){
                    $modules[] = $value['module'];
                }
            }else{
                $modules = [];
            }
            $token = array(
                'iss' => "http://http://47.92.79.128",    //签发者
                'aud' => $request->input()['role'],     //接收jwt的一方
                'iat' => time(),                         //签发时间
                'exp' => time() + $exp,                  //jwt的过期时间，过期时间必须要大于签发时间
                'nbf' => time(),                         //该时间前不接受处理该token
                'data'=> [
                    'id'=> $user['id'],
                    'username' => $data['username'],        //用户名
                    'password' => md5($data['password']),   //密码
                    'role_id'  => $user['role_id'],         //角色id
                    'auth'     => $user['auth'],             //账户权限
                    'roleAuth'     =>$userAuth['auth'],     //角色权限
                    'nike'     => $user['nike'],             //昵称
                    'role'     => 'admin',                   //角色
                    'modules' => $modules                     //有权限菜单的归纳模块
                ]
            );
            //2、生成token码
            $token = JWT::encode($token, \config('jwt.privateKey'), \config('jwt.type'));
            $message = [
                'code'=>200,
                'token'=>$token,
                'msg'=>'授权成功',
                'auth' => $user['auth'],
                'roleAuth'     => $userAuth['auth'],
                'firstModule' => $modules['0']
            ];

        }else{
            $user = psf()->call(
                "Token.AdminData::user",
                [
                    $where,
                    [
                        'id',
                        'username',
                        'password',
                        'nike'
                    ]
                ]
            )->getResult();
            $token = array(
                'iss' => "http://47.92.79.128",    //签发者
                'aud' => $request->input()['role'],     //接收jwt的一方
                'iat' => time(),                         //签发时间
                'exp' => time() + $exp,                  //jwt的过期时间，过期时间必须要大于签发时间
                'nbf' => time(),                         //该时间前不接受处理该token
                'data'=> [
                    'id' => $user['id'],
                    'username' =>$data['username'],
                    'password' => md5($data['password']),
                    'nike'     => $user['nike'],
                    'role'     => 'user'
                ]
            );
            //2、生成token码
            $token = JWT::encode($token, \config('jwt.privateKey'), \config('jwt.type'));
            $message = [
                'code'=>200,
                'token'=>$token,
                'msg'=>'授权成功',
                ];
        }
        DB::commit();
        if(empty($user)){
            $json = ['code'=>0,'msg'=>'授权失败'];
            $response = Context()->getResponse();
            return $response->withData($json);
        }
        $response = Context()->getResponse();
        //3、将token码加入响应头返回用户端
        return $response->withHeader('token',$token)->withData(
            $message);
    }


}