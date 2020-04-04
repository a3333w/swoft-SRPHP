<?php
/**
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\Lanka\System\Role\Dao;

use App\Model\Entity\SystemRole;
use App\Model\Lanka\BaseService\BaseDao\BaseDao;
use Swoft\Db\Query;
use Swoft\Db\Db;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Stdlib\Helper\ArrayHelper;


/**
 * Class ModuleDao
 * @Bean(name="Role.RoleDao",scope=Bean::PROTOTYPE)
 */
class RoleDao extends BaseDao
{

    public function __construct()
    {
        $this->entity = new SystemRole();
        $this->tableName = 'system_role';
    }

    /**
     * 角色分页
     * @param $limit
     * @param $curr
     * @return bool
     * @author liuqiaomu
     */
    public function getLimit($limit, $curr){
        $data = DB::table($this->tableName)
            ->forPage($curr, $limit)
            ->get();

        return ArrayHelper::toArray($data);
    }

    /**
     * 聚合获取一共多少条
     * @return int
     * @author liuqiaomu
     */
    public function getCount(){
        return DB::table($this->tableName)->count();
    }

    /**
     * 获得一条数据
     * @return int
     * @author liuqiaomu
     */
    public function editFind($id){
        return DB::table($this->tableName)->where('id',$id)->first();
    }

    /**
     * 编辑模块数据
     * @return int
     * @author liuqiaomu
     */
    public function editRole($id, $data){
        return DB::table($this->tableName)->where('id',$id)->update($data);
    }

    /**
     * 获得符合条件的角色
     * @return array
     * @author liuqiaomu
     */
    public function getRole($where, $column = ["*"]){
        $res  = DB::table($this->tableName);
        if(!empty($where)){
            $res = $res->where($where)
                ->get($column);
            return ArrayHelper::toArray($res);
        }
        $res = $res->get($column);
        return ArrayHelper::toArray($res);
    }

    /**
     * 删除角色数据
     * @return int
     * @author liuqiaomu
     */
    public function deleteRole($id){

    }

    /**
     * 改变角色状态
     * @return int
     * @author liuqiaomu
     */
    public function changeStatus($id, $status){
        return DB::table($this->tableName)->where('id',$id)->update([
            'status'=>$status
        ]);
    }

}
