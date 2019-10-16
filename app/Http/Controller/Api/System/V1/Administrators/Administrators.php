<?php declare(strict_types=1);

namespace App\Http\Controller\Api\System\V1\Administrators;


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
 * Class AdministratorsController
 * @since 2.0
 * @Controller(prefix="/admin/system/administrators")
 */

class Administrators
{
    /**
     * 管理员数据库生成
     * @RequestMapping(route="create",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function create(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('administrators')($response, $request, __FUNCTION__);
        if($data){
            return Message::returnMsg([
                'status' => 1
            ],'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 获取管理员列表
     * @RequestMapping(route="getlist",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function getList(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('administrators')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
        }
    }


    /**
     * 改变管理员状态
     * @RequestMapping(route="changestatus",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function changeStatus(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('administrators')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 编辑时获得本条数据信息
     * @RequestMapping(route="editfindadministrators",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function editFindAdministrators(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('administrators')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg([
                'res'=>$data[0],
                'menu'=>$data[1]
            ],'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 编辑管理员信息
     * @RequestMapping(route="editadministrators",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function editAdministrators(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('administrators')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg([
                'status'=> 1
            ],'Success',Message::CODE_SUCCESS);
        }
    }

}