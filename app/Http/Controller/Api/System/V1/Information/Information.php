<?php declare(strict_types=1);

namespace App\Http\Controller\Api\System\V1\Information;


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
use Swoft\Validator\Annotation\Mapping\ValidateType;


/**
 * Class InformationController
 * @since 2.0
 * @Controller(prefix="/admin/system/information")
 */

class Information
{
    /**
     * 获得系统信息
     * @RequestMapping("getsysteminformation", method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function getSystemInformation(Response $response,Request $request)
    {
        $data = \Swoft::getBean('information')($response, $request);
        return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
    }

}