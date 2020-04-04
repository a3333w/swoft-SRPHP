<?php
/**
 * data层demo
 *
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\System\Log\Data;

use App\Model\BaseService\BaseData\BaseData;
use App\Model\System\Module\Dao\ModuleDao;
use Swoft;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;


/**
 * Class LogData
 * @since 2.0
 * @Bean(name="Log.LogData",scope=Bean::PROTOTYPE)
 *
 */
class LogData extends BaseData
{
    /**
     * @Inject("Log.LogDao")
     * @var \App\Model\System\Log\Dao\LogDao;
     */
    private $dao;

    /**
     * 添加操作日志
     * @param $arr
     * @return bool
     * @author liuqiaomu
     */
    public function create($arr){
        return $this->dao->create($arr);
    }

    /**
     * 判断是否已有记录
     * @param $arr
     * @return bool
     * @author liuqiaomu
     */
    public function inLog($arr, $columns= ['*']){
        return $this->dao->inLog($arr, $columns);
    }

    /**
     * 自增
     * @param $arr
     * @return bool
     * @author liuqiaomu
     */
    public function asc($arr, $increment){
        return $this->dao->asc($arr, $increment);
    }

    /**
     * 日志分页
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


}