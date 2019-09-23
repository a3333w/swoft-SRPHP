<?php
/**
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\Lanka\System\Log\Dao;

use App\Model\Entity\SystemLog;
use App\Model\Entity\SystemMenu;
use App\Model\Entity\SystemModule;
use App\Model\Lanka\BaseService\BaseDao\BaseDao;
use App\Modle\Lanka\System\Log\Enum\LogTimeExpireMenu;
use Swoft\Db\Query;
use Swoft\Db\Db;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Stdlib\Helper\ArrayHelper;


/**
 * Class LogDao
 * @Bean(name="LanKa.SCF.Log.LogDao",scope=Bean::PROTOTYPE)
 */
class LogDao extends BaseDao
{

    public function __construct()
    {
        $this->entity = new SystemLog();
        $this->tableName = 'system_log';
    }

    /**
     * 判断是否已有记录
     * @param $arr
     * @author liuqiaomu
     */
    public function inLog($arr, $columns= ['*']){
        return DB::table($this->tableName)
            ->where($arr)
            ->where('updated_at','>',date('Y-m-d h:i:s',time()-LogTimeExpireMenu::ONEDAY))
            ->first($columns);
    }

    /**
     * 自增
     * @param $arr
     * @author liuqiaomu
     */
    public function asc($arr, $increment){
        return DB::table($this->tableName)
            ->where($arr)
            ->increment('count');
    }

    /**
     * 日志分页
     * @param $limit
     * @param $curr
     * @return array
     * @author liuqiaomu
     */
    public function getLimit($limit, $curr){
        $data = DB::table($this->tableName)
            ->forPage($curr, $limit)
            ->orderBy('updated_at','desc')
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

}
