<?php
/**
 * @author liuqiaomu
 * @date 2019/07/05
 */
namespace App\Model\Lanka\System\Token\Dao;

use App\Model\Lanka\BaseService\BaseDao\BaseDao;
use Swoft\Db\Query;
use Swoft\Db\Db;
use Swoft\Bean\Annotation\Mapping\Bean;


/**
 * Class AdminDao
 * @Bean(name="Token.AdminDao",scope=Bean::PROTOTYPE)
 */
class AdminDao extends BaseDao
{

    /**
     * 根据账号密码获取管理员用户
     * @param $arr
     * @return array
     * @author liuqiaomu
     */
    public function systemUser($where, $columns= ['*'])
    {
        $user = DB::table('system_user')
            ->where($where)
            ->first($columns);
        return $user;
    }


    /**
     * 根据账号密码获取普通用户
     * @param $arr
     * @return array
     * @author liuqiaomu
     */
    public function user($where, $columns= ['*'])
    {
        $user = DB::table('users')
            ->where($where)
            ->first($columns);
        return $user;
    }


    /**
     * add 数据
     * @return array
     * @author liuqiaomu
     */

    public function find(array $where, $columns= ['*'])
    {
        $users = DB::table('_birthday')->get();
    }





}
