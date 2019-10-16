<?php declare(strict_types=1);

namespace App\Http\Controller\Api\System\V1\Config;


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
 * Class InformationController
 * @since 2.0
 * @Controller(prefix="/admin/system/config")
 */

class ConfigRelevant
{
    /**
     * 写入配置
     * @RequestMapping(route="create",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function create(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
        if($data == true) {
            return Message::returnMsg($data, 'Success', Message::CODE_SUCCESS);
        }
    }

    /**
     * 获得配置管理分组
     * @RequestMapping(route="getconfigtitle",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function getConfigTitle(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg(
                $data
            ,'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 写入配置管理分组
     * @RequestMapping(route="writeconfigtitle",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function writeConfigTitle(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg([
                'status' => 1
            ],'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 获取分组配置
     * @RequestMapping(route="getconfiglist",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function getConfigList(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg([
                'status' => 1
            ],'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 获取总共条数
     * @RequestMapping(route="getconfigcount",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */

    public function getCount(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
            return Message::returnMsg([
                'num' => $data
            ],'Success',Message::CODE_SUCCESS);
    }

    /**
     * 获得配置列表
     * @RequestMapping(route="getlist",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */

    public function getList(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
        return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
    }

    /**
     * 获得单个配置
     * @RequestMapping(route="editfindconfig",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function editFindConfig(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
        return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
    }

    /**
     * 修改单个配置
     * @RequestMapping(route="editconfig",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function editConfig(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
        if($data == true) {
            return Message::returnMsg($data, 'Success', Message::CODE_SUCCESS);
        }
    }

    /**
     * 删除单个配置
     * @RequestMapping(route="deleteconfig",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function deleteConfig(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
        if($data == true) {
            return Message::returnMsg($data, 'Success', Message::CODE_SUCCESS);
        }
    }

    /**
     * 系统配置批量修改
     * @RequestMapping(route="systemconfigedit",method=RequestMethod::GET)
     * @param Response $response
     * @param Request $request
     */
    public function systemConfigEdit(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('configrelevant')($response, $request, __FUNCTION__);
        if($data == true) {
            return Message::returnMsg($data, 'Success', Message::CODE_SUCCESS);
        }
    }



}