<?php
/**
 * data层demo
 *
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\Lanka\System\Module\Data;

use App\Model\Lanka\BaseService\BaseData\BaseData;
use App\Model\Lanka\System\Module\Dao\ModuleDao;
use Swoft;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;


/**
 * Class ModuleData
 * @since 2.0
 * @Bean(name="LanKa.SCF.Module.ModuleData",scope=Bean::PROTOTYPE)
 *
 */
class ModuleData extends BaseData
{
    /**
     * @Inject("LanKa.SCF.Module.ModuleDao")
     * @var \App\Model\Lanka\System\Module\Dao\ModuleDao
     */
    private $dao;


    /**
     * 增加模块
     * @param $arr
     * @return bool
     * @author liuqiaomu
     */
    public function create($arr){
        return $this->dao->create($arr);
    }

    /**
     * 模块分页
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
     * 编辑模块数据
     * @return int
     * @author liuqiaomu
     */
    public function editModule($id, $data){
        return $this->dao->editModule($id, $data);
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