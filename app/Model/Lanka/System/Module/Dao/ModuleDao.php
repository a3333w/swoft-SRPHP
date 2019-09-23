<?php
/**
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\Lanka\System\Module\Dao;

use App\Model\Entity\SystemModule;
use App\Model\Lanka\BaseService\BaseDao\BaseDao;
use Swoft\Db\Query;
use Swoft\Db\Db;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Stdlib\Helper\ArrayHelper;


/**
 * Class ModuleDao
 * @Bean(name="LanKa.SCF.Module.ModuleDao",scope=Bean::PROTOTYPE)
 */
class ModuleDao extends BaseDao
{

    public function __construct()
    {
        $this->entity = new SystemModule();
        $this->tableName = 'system_module';
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
     * 编辑模块数据
     * @return int
     * @author liuqiaomu
     */
    public function editModule($id, $data){
        return DB::table($this->tableName)->where('id',$id)->update($data);
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
