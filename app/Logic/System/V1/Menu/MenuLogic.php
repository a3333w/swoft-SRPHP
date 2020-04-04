<?php declare(strict_types=1);

namespace App\Logic\System\V1\Menu;


use Firebase\JWT\JWT;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoole\Exception;

/**
 * Class MenuLogicClass
 * @since 2.0
 * @Bean(name="menu", scope=Bean::PROTOTYPE)
 */
class MenuLogic
{
    /**
     * 魔术方法 中转调用方法
     * @param $response
     * @param $request
     * @param $method 调用的方法
     * @return bool
     * @author liuqiaomu
     */
    public function __invoke(Response $response,Request $request, $method)
    {
        //进入需要调用得方法
        return $this->$method($response, $request);
    }

    /**
     * 创建顶级菜单
     * @param Response $response
     * @param Request $request
     */
    public function createTop(Response $response,Request $request)
    {
        $data = $request->query('data');
        $data['module'] = 'system';
        //顶级菜单入库
        return psf()->call(
            "Menu.MenuData::create",
            [
                $data,
            ]
        )->getResult();
    }

    /**
     * 创建子菜单
     * @param Response $response
     * @param Request $request
     */
    public function createChild(Response $response,Request $request)
    {
        $id = $request->query('id');

        //获得父类等级
        $fatherLevel =  psf()->call(
            "Menu.MenuData::getMenuByid",
            [
                $id,['level'],true
            ]
        )->getResult();
        $data = [
            'pid' => $id,
            'level' => $fatherLevel['level'] + 1,
            'title' => $request->query('data')['title'],
            'url' => $request->query('data')['url'],
            'hraf' => $request->query('data')['hraf'],
            'module' => $request->query('data')['module'],
            'nav' => $request->query('data')['nav'],
        ];
        $bool = psf()->call(
            "Menu.MenuData::create",
            [
                $data,
            ]
        )->getResult();

        return $bool;
    }

    /**
     * 编辑菜单信息
     * @param Response $response
     * @param Request $request
     */
    public function menuEdit(Response $response,Request $request)
    {
        $data = $request->query('data');
        $id = $request->query('id');
        return psf()->call(
            "Menu.MenuData::editMenu",
            [
                $id,$data,
            ]
        )->getResult();
    }

    /**
     * 删除菜单
     * @param Response $response
     * @param Request $request
     */
    public function deleteMune(Response $response,Request $request)
    {

        $id = $request->query('id');
        $where = [
            'pid' => $id
        ];

        $child = psf()->call(
            "Menu.MenuData::find",
            [
                $where,
            ]
        )->getResult();
        if($child){
            return false;
        }

        return psf()->call(
            "Menu.MenuData::deleteMenu",
            [
                $id,
            ]
        )->getResult();
    }

    /**
     * 获得菜单树
     * @param Response $response
     * @param Request $request
     */
    public function getMenuTree(Response $response,Request $request)
    {
        $data = \Swoft\Db\DB::table('system_menu')
            ->where('pid',0)
            ->get();;
        $data = \Swoft\Stdlib\Helper\ArrayHelper::toArray($data);
        $data = menuList($data);
        return $data;
    }

    /**
     * 获得菜单信息
     * @param Response $response
     * @param Request $request
     */
    public function getMenu(Response $response,Request $request)
    {
        $id = $request->query('id');
        $data = [
            'id'=>$id
        ];
        return  psf()->call(
            "Menu.MenuData::find",
            [
                $data
            ]
        )->getResult();
    }

    /**
     * 权限分配菜单
     * @param Response $response
     * @param Request $request
     */
    public function getmenuTreeRole(Response $response,Request $request)
    {
        $data = \Swoft\Db\DB::table('system_menu')
            ->where('pid',0)
            ->get();
        $data = \Swoft\Stdlib\Helper\ArrayHelper::toArray($data);
        $data = menuList($data);
        return $data;
    }

    /**
     * 获得账户所属角色拥有权限的首页显示菜单
     * @param Response $response
     * @param Request $request
     */
    public function getAuthMenu(Response $response,Request $request)
    {
        //获得账号权限
        $ids = $request->query('auth');
        $module = $request->query('module');
        //获得账号权限下一级菜单
        $data = \Swoft\Db\DB::table('system_menu')
            ->where([
                'pid' => 0,
                'level' => 1,
                'module' => $module
                ])
            ->whereIn('id',$ids)
            ->get();

        //转数组
        $data = \Swoft\Stdlib\Helper\ArrayHelper::toArray($data);
        //获得账号下一级二级菜单
        $data = menuFirstPage($data);
        return $data;

    }

}