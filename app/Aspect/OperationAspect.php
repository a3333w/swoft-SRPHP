<?php declare(strict_types=1);

/**
 * 操作日志记录
 * @author liuqiaomu
 */
namespace App\Aspect;

use Firebase\JWT\JWT;
use Swoft\Aop\Annotation\Mapping\AfterReturning;
use Swoft\Aop\Annotation\Mapping\AfterThrowing;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Point\JoinPoint;
use Swoft\Aop\Point\ProceedingJoinPoint;
use Swoft\Db\DB;


/**
 * Class OperationAspect
 *
 * @since 2.0
 *
 * @Aspect(order=2)
 * @PointBean(
 *     include={"menu","role","module","log","information","configrelevant","administrators"}
 * )
 */
class OperationAspect
{
    /**
     * @Before()
     */
    public function before( )
    {

    }

    /**
     * @After()
     */
    public function after()
    {
        $request = \Swoft\Context\Context::mustGet()->getRequest();
        $uri = $request->getServerParams()['request_uri'];   //获得请求url
        $uriSub = substr($uri,0,7);              //截取请求url
        $rule = '/^\/?\b(' . \config('jwt.systemUserUri') .')\b\/?/'; //正则规则 '/admin/'
        $grepAdministration = grep($rule, $uriSub,0,7);           //正则匹配 helper函数
        if($grepAdministration) {
            $url = mb_substr($uri, 7);
            $ip = $request->getServerParams()['remote_addr'];    //获取本机ip
            $input = $request->input();
            $inputArr = [];
            foreach ($input as $key => $value) {
                if ($key == 'token') {
                    continue;
                }
                $inputArr[] = $value;
            }
            DB::beginTransaction();
            //获取菜单
            $data = psf()->call(
                "LanKa.SCF.Menu.MenuData::getMenuByUrl",
                [
                    $url, ['title','module']
                ]
            )->getResult();
            $token = getToken($request);
            $auth = JWT::decode($token, config('jwt.publicKey'), ['type' => \config('jwt.type')]);
            //获取用户名
            $RoleAdmin = $auth->data->nike;
            $RoleAdminId = $auth->data->id;
            $logData = [
                'title' => $data['title'],
                'module' => $data['module'],
                'uid' => $RoleAdminId,
                'url' => $url,
                'uname' => $RoleAdmin,
                'param' => json_encode($inputArr),
                'ip' => $ip
            ];
            //判断是否已有此操作
            $log = psf()->call(
                "LanKa.SCF.Log.LogData::inLog",
                [
                    $logData
                ]
            )->getResult();
            if(empty($log)){
                psf()->call(
                    "LanKa.SCF.Log.LogData::create",
                    [
                        $logData
                    ]
                )->getResult();
            }else{
                psf()->call(
                    "LanKa.SCF.Log.LogData::asc",
                    [
                        $logData,'count'
                    ]
                )->getResult();
            }
            DB::commit();
        }
    }

}