<?php
/**
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\System\Administrators\Dao;

use App\Model\Entity\SystemUser;
use App\Model\BaseService\BaseDao\BaseDao;
use Swoft\Db\Query;
use Swoft\Db\Db;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Stdlib\Helper\ArrayHelper;


/**
 * Class ModuleDao
 * @Bean(name="Administrators.AdministratorsDao",scope=Bean::PROTOTYPE)
 */
class AdministratorsDao extends BaseDao
{

    public function __construct()
    {
        $this->entity = new SystemUser();
        $this->tableName = 'system_user';
    }

    /**
     * 模块分页
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
     * 编辑管理员数据
     * @return int
     * @author liuqiaomu
     */
    public function editAdministrators($id, $data){
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
     * 改变角色状态
     * @return int
     * @author liuqiaomu
     */
    public function changeStatus($id, $status){
        return DB::table($this->tableName)->where('id',$id)->update([
            'status'=>$status
        ]);
    }


    /**
     * 删除模块数据
     * @return int
     * @author liuqiaomu
     */
    public function deleteModule($id){
       return DB::table($this->tableName)->where('id',$id)->update([
           'status' => 0,
           'dtime'  => date("Y/m/d H:m:s")
       ]);
    }

}
