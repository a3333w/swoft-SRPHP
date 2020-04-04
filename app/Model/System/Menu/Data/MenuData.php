<?php
/**
 * data层demo
 *
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\System\Menu\Data;

use App\Model\BaseService\BaseData\BaseData;
use App\Model\System\Module\Dao\ModuleDao;
use Swoft;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;


/**
 * Class ModuleData
 * @since 2.0
 * @Bean(name="Menu.MenuData",scope=Bean::PROTOTYPE)
 *
 */
class MenuData extends BaseData
{
    /**
     * @Inject("Menu.MenuDao")
     * @var \App\Model\System\Menu\Dao\MenuDao
     */
    private $dao;


    /**
     * 增加分类
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
     * 编辑菜单数据
     * @return int
     * @author liuqiaomu
     */
    public function editMenu($id, $data){
        return $this->dao->editMenu($id, $data);
    }

    /**
     * 删除菜单数据
     * @return int
     * @author liuqiaomu
     */
    public function deleteMenu($id)
    {
        return $this->dao->deleteMenu($id);
    }

    /**
     * 获得一条数据
     * @return array
     * @author liuqiaomu
     */
    public function find(array $where, $columns= ['*'])
    {
        return $this->dao->find($where, $columns);
    }

    /**
     * id多个匹配
     * @return array
     * @author liuqiaomu
     */
    public function getMenuByid($id, $columns= ['*'], $boll)
    {
        return $this->dao->getMenuByid($id, $columns, $boll);
    }

    /**
     * url匹配
     * @return array
     * @author liuqiaomu
     */
    public function getMenuByUrl($url, $columns= ['*'])
    {
        return $this->dao->getMenuByUrl($url, $columns);
    }

}