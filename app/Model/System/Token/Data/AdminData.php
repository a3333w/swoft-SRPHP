<?php
/**
 * data层demo
 *
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\System\Token\Data;

use App\Model\BaseService\BaseData\BaseData;
use App\Model\System\Token\Dao\AdminDao;
use Swoft;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;


/**
 * Class AdminData
 * @since 2.0
 * @Bean(name="Token.AdminData",scope=Bean::PROTOTYPE)
 *
 */
class AdminData extends BaseData
{
    /**
     * @Inject("Token.AdminDao")
     * @var \App\Model\System\Token\Dao\AdminDao
     */
    private $dao;

    /**
     *根据账号密码获取管理员用户
     * @param $arr
     * @return array
     * @author liuqiaomu
     */
    public function systemUser($where, $columns= ['*']){
        return $this->dao->systemUser($where, $columns);
    }

    /**
     * 根据账号密码获取普通用户
     * @param $idArray
     * @return array
     * @author liuqiaomu
     */
    public function user($arr, $columns= ['*']){
        return $this->dao->user($arr, $columns);
    }


    /**
     * 根据orderId获取还款车辆
     * @param $idArray
     * @return array
     * @author liuqiaomu
     */
    public function create($idArray){
        return $this->dao->create($idArray);
    }

    public function insert($idArray){
        return $this->dao->insert($idArray);
    }

    public function find(array $where, $columns= ['*']){
        return $this->dao->find($where, $columns);
    }


}