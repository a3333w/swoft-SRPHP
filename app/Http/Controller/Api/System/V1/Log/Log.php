<?php declare(strict_types=1);

namespace App\Http\Controller\Api\System\V1\Log;


use App\Utils\Message;
use App\Utils\Sms\SendSms;
use ReflectionException;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Context\Context;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Validator\Annotation\Mapping\Validate;


/**
 * Class LogController
 * @since 2.0
 * @Controller(prefix="/admin/system/log")
 */

class Log
{
    /**
     * 获取操作日志列表
     * @RequestMapping(route="getlist",method={RequestMethod::GET})
     * @Validate(validator="TestValidator",type="get")
     * @param Response $response
     * @param Request $request
     */
    public function getList(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('log')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
        }
    }

}