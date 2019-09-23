<?php declare(strict_types=1);

namespace App\Http\Controller\Api\System\V1\Menu;


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
 * @Controller(prefix="/admin/system/menu")
 */

class Menu
{
    /**
     * 创建顶级菜单
     * @RequestMapping(route="createtop",method={RequestMethod::GET})
     * @Validate(validator="TestValidator",type="get")
     * @param Response $response
     * @param Request $request
     */
    public function createTop(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('menu')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg([
                'status' => 1
            ],'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 创建子菜单
     * @RequestMapping(route="createchild",method={RequestMethod::GET})
     * @Validate(validator="TestValidator",type="get")
     * @param Response $response
     * @param Request $request
     */
    public function createChild(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('menu')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg([
                'status' => 1
            ],'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 获得单条菜单
     * @RequestMapping(route="getmenu",method={RequestMethod::GET})
     * @Validate(validator="TestValidator",type="get")
     * @param Response $response
     * @param Request $request
     */
    public function getMenu(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('menu')($response, $request, __FUNCTION__);
        if($data){
            return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 编辑菜单
     * @RequestMapping(route="menuedit",method={RequestMethod::GET})
     * @Validate(validator="TestValidator",type="get")
     * @param Response $response
     * @param Request $request
     */
    public function menuEdit(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('menu')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg([
                'status' => 1
            ],'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 删除菜单
     * @RequestMapping(route="deletemenu",method={RequestMethod::GET})
     * @Validate(validator="TestValidator",type="get")
     * @param Response $response
     * @param Request $request
     */
    public function deleteMune(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('menu')($response, $request, __FUNCTION__);
        if($data == true){
            return Message::returnMsg([
                'status' => 1
            ],'Success',Message::CODE_SUCCESS);
        }else{
            return Message::error('error',Message::CODE_ERROR,[
                'status' => 0
            ]);
        }
    }

    /**
     * 获得菜单树
     * @RequestMapping(route="getmenutree",method={RequestMethod::GET})
     * @Validate(validator="TestValidator",type="get")
     * @param Response $response
     * @param Request $request
     */
    public function getMenuTree(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('menu')($response, $request, __FUNCTION__);
        if($data){
            return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 权限分配获得菜单
     * @RequestMapping(route="getmenutreerole",method={RequestMethod::GET})
     * @Validate(validator="TestValidator",type="get")
     * @param Response $response
     * @param Request $request
     */
    public function getmenuTreeRole(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('menu')($response, $request, __FUNCTION__);
        if($data){
            return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
        }
    }

    /**
     * 获得账户所属角色拥有权限的首页显示菜单
     * @RequestMapping(route="getauthmenu",method={RequestMethod::GET})
     * @Validate(validator="TestValidator",type="get")
     * @param Response $response
     * @param Request $request
     */
    public function getAuthMenu(Response $response,Request $request)
    {
        //进入逻辑层处理
        $data = \Swoft::getBean('menu')($response, $request, __FUNCTION__);
        if($data){
            return Message::returnMsg($data,'Success',Message::CODE_SUCCESS);
        }
    }

}
