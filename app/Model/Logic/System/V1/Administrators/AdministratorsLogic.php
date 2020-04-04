<?php declare(strict_types=1);

namespace App\Model\Logic\System\V1\Administrators;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\HttpServer;

/**
 * Class AdministratorsLogicClass
 * @since 2.0
 * @Bean(name="administrators", scope=Bean::PROTOTYPE)
 */
class AdministratorsLogic
{
    /**
     * 请求数据
     *
     * @var array
     */
    private $data = [];

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
     * 新增管理员逻辑
     * @param $response
     * @param $request
     * @return bool
     * @author liuqiaomu
     */
    public function create( $response, $request)
    {
        $data = $request->query('data');
        $data['password'] = md5($data['password']);
        return psf()->call(
            "Administrators.AdministratorsData::create",
            [
                $data
            ]
        )->getResult();
    }


    /**
     * 获得管理列表
     * @param $response
     * @param $request
     * @return array
     * @author liuqiaomu
     */
    public function getList( $response, $request)
    {
        $limit = $request->query()['limit']; //分页数
        $curr  = $request->query()['curr'];  //当前页

        //获得角色列表
        $list = psf()->call(
            "Administrators.AdministratorsData::getLimit",
            [
                $limit,$curr
            ]
        )->getResult();
        //获得一共多少条
        $count = psf()->call(
            "Administrators.AdministratorsData::getCount"
        )->getResult();
        $data = [
            'list'=>$list,
            'count'=>$count
        ];
        return $data;
    }

    /**
     * 获取所有角色
     * @param Response $response
     * @param Request $request
     */
    public function getRole(Response $response,Request $request)
    {
        $where = [];
        //获得角色
        return  psf()->call(
            "Role.RoleData::getRole",
            [
                $where
            ]
        )->getResult();
    }

    /**
     * 改变角色状态
     * @param Response $response
     * @param Request $request
     */
    public function changeStatus(Response $response,Request $request)
    {
        $id = $request->query('id');
        $status = $request->query('status');
        return  psf()->call(
                "Administrators.AdministratorsData::changeStatus",
                [
                    $id,$status
                ]
            )->getResult();
    }

    /**
     * 编辑时候获得本条数据信息
     * @param $response
     * @param $request
     * @return array
     * @author liuqiaomu
     */
    public function editFindAdministrators( $response, $request)
    {
        $id  = $request->query()['id'];
        //获得一条数据
        $res = psf()->call(
            "Administrators.AdministratorsData::editFind",
            [
                $id
            ]
        )->getResult();
        $where = [];
        //获得角色
        $data = psf()->call(
            "Role.RoleData::getRole",
            [
                $where
            ]
        )->getResult();

        return [
            $res,
            $data
        ];
    }

    /**
     * 编辑管理员信息
     * @param $request
     * @return $bool
     * @author liuqiaomu
     */
    public function editAdministrators($response, $request)
    {
        $id = $request->query('id');
        $data = $request->query('data');
        $data['password'] = md5($data['password']);
        unset($data['repassword']);

        return psf()->call(
            "Administrators.AdministratorsData::editAdministrators",
            [
                $id,$data
            ]
        )->getResult();
    }


    /**
     * 删除模块
     * @param $request
     * @return $bool
     * @author liuqiaomu
     */
    public function deleteModule($response, $request)
    {
        $id = $request->query()['id']; //获得id
        $where = [
            'id' => $id
        ];
        $columns = [
            'name'
        ];
        //事务开始
        DB::beginTransaction();
        $data = psf()->call(
            "Module.ModuleData::find",
            [
                $where, $columns
            ]
        )->getResult();

        //伪删除模块数据库数据
        $bool = psf()->call(
            "Module.ModuleData::deleteModule",
            [
                $id
            ]
        )->getResult();
        DB::commit();
        return $bool;
    }

}