<?php
/**
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\System\Menu\Dao;

use App\Model\Entity\SystemMenu;
use App\Model\Entity\SystemModule;
use App\Model\BaseService\BaseDao\BaseDao;
use Swoft\Db\Query;
use Swoft\Db\Db;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Stdlib\Helper\ArrayHelper;


/**
 * Class ModuleDao
 * @Bean(name="Menu.MenuDao",scope=Bean::PROTOTYPE)
 */
class MenuDao extends BaseDao
{

    public function __construct()
    {
        $this->entity = new SystemMenu();
        $this->tableName = 'system_menu';
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
     * 编辑菜单数据
     * @return int
     * @author liuqiaomu
     */
    public function editMenu($id, $data){
        return DB::table($this->tableName)->where('id',$id)->update($data);
    }

    /**
     * 删除菜单数据
     * @return int
     * @author liuqiaomu
     */
    public function deleteMenu($id){
       return DB::table($this->tableName)->where('id',$id)->update([
           'status' => 0,
           'dtime'  => date("Y/m/d H:m:s")
       ]);
    }

    /**
     * id多个匹配
     * @return array
     * @author liuqiaomu
     */
    public function getMenuByid($id, $columns= ['*'], $boll)
    {
        $data = DB::table($this->tableName);
        if(is_array($id)){
            $data = $data->whereIn('id',$id);
            if($boll){
                $data =  $data->distinct()
                    ->get($columns);
            }else{
                $data = $data->get($columns);
            }
        }else{
            $data = $data->where('id',$id)
                ->first($columns);
        }
        return $data;
    }

    /**
     * url匹配
     * @author liuqiaomu
     */
    public function getMenuByUrl($url, $columns= ['*'])
    {
        return DB::table($this->tableName)
            ->where('url',$url)
            ->where('level','>',2)
            ->first($columns);
    }

}
