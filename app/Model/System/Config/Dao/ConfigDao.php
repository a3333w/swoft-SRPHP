<?php
/**
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\System\Config\Dao;

use App\Model\Entity\SystemConfig;
use App\Model\Entity\SystemModule;
use App\Model\BaseService\BaseDao\BaseDao;
use PHPUnit\Framework\Exception;
use Swoft\Db\Query;
use Swoft\Db\Db;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Stdlib\Helper\ArrayHelper;


/**
 * Class ModuleDao
 * @Bean(name="Config.ConfigDao",scope=Bean::PROTOTYPE)
 */
class ConfigDao extends BaseDao
{

    public function __construct()
    {
        $this->entity = new SystemConfig();
        $this->tableName = 'system_config';
    }

    /**
     * 配置分页
     * @param $limit
     * @param $curr
     * @return bool
     * @author liuqiaomu
     */
    public function getLimit($limit, $curr, $where){
       if(isset($where)){
           $data = DB::table($this->tableName)
               ->where($where)
               ->forPage($curr, $limit)
               ->get();
       }else{
           $data = DB::table($this->tableName)
               ->forPage($curr, $limit)
               ->get();
       }
       if(!is_array($data)){
           return ArrayHelper::toArray($data);
       }
    }


    /**
     * 聚合获取一共多少条
     * @return int
     * @author liuqiaomu
     */
    public function getCount($where){
        if(!isset($where)){
            return DB::table($this->tableName)->count();
        }else{
            return DB::table($this->tableName)
                ->where($where)
                ->count();
        }
    }

    /**
     * 获得配置列表
     * @author liuqiaomu
     */
    public function getList($limit,$curr,$where){
        if(empty($where)){
            $re = DB::table($this->tableName);
            if(empty($limit) || empty($curr)){
                $re = $re->get();
            }else{
                $re = $re->forPage($curr, $limit)
                    ->get();
            }
        }else{
            $re = DB::table($this->tableName)
                ->where($where);
            if(empty($limit) || empty($curr)){
                $re = $re->get();
            }else{
                $re = $re->forPage($curr, $limit)
                    ->get();
            }
        }
        return ArrayHelper::toArray($re);
    }

    /**
     * 获得单个配置
     * @return array
     * @author liuqiaomu
     */
    public function getConfig($id){
        $data =  DB::table($this->tableName)
            ->where('id',$id)
            ->first();
        return ArrayHelper::toArray($data);
    }

    /**
     * 修改单个配置
     * @return bool
     * @author liuqiaomu
     */
    public function editConfig($id,$data){
        return DB::table($this->tableName)->where('id',$id)->update($data);
    }

    /**
     * 删除配置数据
     * @return int
     * @author liuqiaomu
     */
    public function deleteConfig($id){
        return DB::table($this->tableName)->where('id',$id)->update([
            'status' => 0,
            'dtime'  => date("Y/m/d H:m:s")
        ]);
    }

    /**
     * 批量修改系统配置
     * @return int
     * @author liuqiaomu
     */
    public function systemConfigEdit($data){
        try{
        foreach ($data as $key => $value) {
            DB::table($this->tableName)->where('name', $key)->update([
                'value' => $value
            ]);
        }
        return true;
        }catch (Exception $e){
            return false;
        }
    }

}
