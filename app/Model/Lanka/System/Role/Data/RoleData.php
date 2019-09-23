<?php
/**
 * data层demo
 *
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\Lanka\System\Role\Data;

use App\Model\Lanka\BaseService\BaseData\BaseData;
use App\Model\Lanka\System\Module\Dao\ModuleDao;
use Swoft;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;


/**
 * Class RoleData
 * @since 2.0
 * @Bean(name="LanKa.SCF.Role.RoleData",scope=Bean::PROTOTYPE)
 *
 */
class RoleData extends BaseData
{
    /**
     * @Inject("LanKa.SCF.Role.RoleDao")
     * @var \App\Model\Lanka\System\Role\Dao\RoleDao
     */
    private $dao;


    /**
     * 增加角色
     * @param $arr
     * @return bool
     * @author liuqiaomu
     */
    public function create($arr){
        return $this->dao->create($arr);
    }

    /**
     * 角色分页
     * @param $limit
     * @param $curr
     * @return bool
     * @author liuqiaomu
     */
    public function getLimit($limit, $curr){
        return $this->dao->getLimit($limit, $curr);
    }

    /**
     * 聚合获取一共多少条模块数据
     * @return int
     * @author liuqiaomu
     */
    public function getCount(){
        return $this->dao->getCount();
    }

    /**
     * 获得一条数据
     * @return int
     * @author liuqiaomu
     */
    public function editFind($id){
        return $this->dao->editFind($id);
    }

    /**
     * 改变角色状态
     * @return int
     * @author liuqiaomu
     */
    public function changeStatus($id, $status){
        return $this->dao->changeStatus($id, $status);
    }

    /**
     * 编辑角色数据
     * @return int
     * @author liuqiaomu
     */
    public function editRole($id, $data){
        return $this->dao->editRole($id, $data);
    }

    /**
     * 获得符合条件的角色
     * @return array
     * @author liuqiaomu
     */
    public function getRole($where, $column = ["*"]){
        return $this->dao->getRole($where, $column);
    }

    /**
     * 删除角色数据
     * @return int
     * @author liuqiaomu
     */
    public function deleteRole($id){
        return $this->dao->deleteRole($id);
    }

    public function find(array $where, $columns= ['*']){
        return $this->dao->find($where, $columns);
    }





}