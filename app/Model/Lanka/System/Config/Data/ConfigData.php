<?php
/**
 * data层demo
 *
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\Lanka\System\Config\Data;

use App\Model\Lanka\BaseService\BaseData\BaseData;
use App\Model\Lanka\System\Module\Dao\ModuleDao;
use Swoft;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;


/**
 * Class ModuleData
 * @since 2.0
 * @Bean(name="LanKa.SCF.Config.ConfigData",scope=Bean::PROTOTYPE)
 *
 */
class ConfigData extends BaseData
{
    /**
     * @Inject("LanKa.SCF.Config.ConfigDao")
     * @var \App\Model\Lanka\System\Config\Dao\ConfigDao
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
     * 配置分页
     * @param $limit
     * @param $curr
     * @return bool
     * @author liuqiaomu
     */
    public function getLimit($limit, $curr, $where){
        return $this->dao->getLimit($limit, $curr, $where);
    }

    /**
     * 聚合获取一共多少条模块数据
     * @return int
     * @author liuqiaomu
     */
    public function getCount($where){
        return $this->dao->getCount($where);
    }

    /**
     * 获得配置列表
     * @return int
     * @author liuqiaomu
     */
    public function getList($limit,$curr,$where){
        return $this->dao->getList($limit,$curr,$where);
    }

    /**
     * 获得单个配置
     * @return array
     * @author liuqiaomu
     */
    public function getConfig($id){
        return $this->dao->getConfig($id);
    }

    /**
     * 修改单个配置
     * @return int
     * @author liuqiaomu
     */
    public function editConfig($id,$data){
        return $this->dao->editConfig($id,$data);
    }

    /**
     * 删除配置数据
     * @return int
     * @author liuqiaomu
     */
    public function deleteConfig($id){
        return $this->dao->deleteConfig($id);
    }

    /**
     * 批量修改系统配置
     * @return int
     * @author liuqiaomu
     */
    public function systemConfigEdit($data){
        return $this->dao->systemConfigEdit($data);
    }




}