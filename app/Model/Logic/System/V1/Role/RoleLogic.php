<?php declare(strict_types=1);

namespace App\Model\Logic\System\V1\Role;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Db\DB;
use Swoft\Http\Message\Request;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\HttpServer;

/**
 * Class RoleLogicClass
 * @since 2.0
 * @Bean(name="role", scope=Bean::PROTOTYPE)
 */
class RoleLogic
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
     * 新增角色逻辑
     * @param $response
     * @param $request
     * @return bool
     * @author liuqiaomu
     */
    public function create( $response, $request)
    {
        $data = $request->query('data');
        $rule = '/^\blayuiTreeCheck\b/'; //正则规则 'layuiTreeCheck'
        $arrAll =[]; //整个数组
        $arr = []; //check数组
        foreach ($data as $key => $value){
            $bool = grep($rule,$key,0,14);
            if($bool){
                $arr[] = $value;
                continue;
            }
            $arrAll[$key] = $value;
        }
        sort($arr);
        $json = json_encode($arr);
        $arrAll['auth'] = $json;
        return psf()->call(
            "LanKa.SCF.Role.RoleData::create",
            [
                $arrAll
            ]
        )->getResult();
    }


    /**
     * 获得角色列表
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
            "LanKa.SCF.Role.RoleData::getLimit",
            [
                $limit,$curr
            ]
        )->getResult();
        //获得一共多少条
        $count = psf()->call(
            "LanKa.SCF.Role.RoleData::getCount"
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
            "LanKa.SCF.Role.RoleData::getRole",
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
                "LanKa.SCF.Role.RoleData::changeStatus",
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
    public function editFindRole( $response, $request)
    {
        $id  = $request->query()['id'];
        //获得一条模块数据
        $res = psf()->call(
            "LanKa.SCF.Role.RoleData::editFind",
            [
                $id
            ]
        )->getResult();

        $arr = json_decode($res['auth']);   // 角色权限数组
        $data = \Swoft\Db\DB::table('system_menu')
            ->where('pid',0)
            ->get();
        $data = \Swoft\Stdlib\Helper\ArrayHelper::toArray($data);
        $data = treeCheck($data, $arr);
        return [
            $res,
            $data
        ];
    }

    /**
     * 编辑角色信息
     * @param $request
     * @return $bool
     * @author liuqiaomu
     */
    public function editRole($response, $request)
    {
        $id = $request->query('id');
        $data = $request->query('data');
        $rule = '/^\blayuiTreeCheck\b/'; //正则规则 'layuiTreeCheck'
        $arrAll =[]; //整个数组
        $arr = []; //check数组
        foreach ($data as $key => $value){
            $bool = grep($rule,$key,0,14);
            if($bool){
                $arr[] = $value;
                continue;
            }
            $arrAll[$key] = $value;
        }
        sort($arr);
        $json = json_encode($arr);
        $arrAll['auth'] = $json;
        return psf()->call(
            "LanKa.SCF.Role.RoleData::editRole",
            [
                $id,$arrAll
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
            "LanKa.SCF.Module.ModuleData::find",
            [
                $where, $columns
            ]
        )->getResult();

        //伪删除模块数据库数据
        $bool = psf()->call(
            "LanKa.SCF.Module.ModuleData::deleteModule",
            [
                $id
            ]
        )->getResult();
        DB::commit();
        return $bool;
    }

}