<?php
/**
 * data层demo
 *
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\System\Administrators\Data;

use App\Model\BaseService\BaseData\BaseData;
use App\Model\System\Module\Dao\ModuleDao;
use Swoft;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;


/**
 * Class RoleData
 * @since 2.0
 * @Bean(name="Administrators.AdministratorsData",scope=Bean::PROTOTYPE)
 *
 */
class AdministratorsData extends BaseData
{
    /**
     * @Inject("Administrators.AdministratorsDao")
     * @var \App\Model\System\Administrators\Dao\AdministratorsDao
     */
    private $dao;


    /**
     * 增加管理员
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
     * 编辑管理员数据
     * @return int
     * @author liuqiaomu
     */
    public function editAdministrators($id, $data){
        return $this->dao->editAdministrators($id, $data);
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
     * 删除模块数据
     * @return int
     * @author liuqiaomu
     */
    public function deleteModule($id){
        return $this->dao->deleteModule($id);
    }

    public function find(array $where, $columns= ['*']){
        return $this->dao->find($where, $columns);
    }





}