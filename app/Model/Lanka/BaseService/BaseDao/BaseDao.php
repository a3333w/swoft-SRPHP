<?php
/**
 * Dao 基类
 * @author liuqiaomu
 */
namespace App\Model\Lanka\BaseService\BaseDao;

use App\Model\Entity\SystemModule;
use Swoft\Db\Eloquent\Model;
use Swoft\Db\Query\Builder as QueryBuilder;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Stdlib\Helper\ArrayHelper;


class BaseDao
{

    /**
     * 升序
     */
    const ORDER_BY_ASC = 'ASC';

    /**
     * 降序
     */
    const ORDER_BY_DESC = 'DESC';

    /**
     * 等于
     */
    const OPERATOR_EQ = '=';

    /**
     * 不等于
     */
    const OPERATOR_NE = '!=';

    /**
     * 小于
     */
    const OPERATOR_LT = '<';

    /**
     * 小于等于
     */
    const OPERATOR_LTE = '<=';

    /**
     * 大于
     */
    const OPERATOR_GT = '>';

    /**
     * 大于等于
     */
    const OPERATOR_GTE = '>=';

    /**
     * 左括号
     */
    const BRACKET_OPEN = '(';

    /**
     * 右括号
     */
    const BRACKET_CLOSE = ')';

    /**
     * 修饰符in
     */
    const IN = 'IN';

    /**
     * 修饰符not in
     */
    const NOT_IN = 'NOT IN';

    /**
     * 修饰符like
     */
    const LIKE = 'LIKE';

    /**
     * 修饰符in
     */
    const NOT_LIKE = 'NOT LIKE';

    /**
     * 修饰符between
     */
    const BETWEEN = 'BETWEEN';

    /**
     * 修饰符not between
     */
    const NOT_BETWEEN = 'NOT BETWEEN';

    /**
     * 内连接
     */
    const INNER_JOIN = 'INNER JOIN';

    /**
     * 左连接
     */
    const LEFT_JOIN = 'LEFT JOIN';

    /**
     * 右连接
     */
    const RIGHT_JOIN = 'RIGHT JOIN';

    /**
     * 逻辑运算符and
     */
    const LOGICAL_AND = 'AND';

    /**
     * 逻辑运算符or
     */
    const LOGICAL_OR = 'OR';

    /**
     * is判断语句
     */
    const IS = 'IS';

    /**
     * is not 判断语句
     */
    const IS_NOT = 'IS NOT';

    /**
     * 实体名称
     * @var Model
     */
    protected $entity;

    /**
     * 保存单条数据 安全赋值
     * @param array $param
     * @return bool
     */
    public function create(array $param)
    {
        return $this->entity::new()->fill($param)->save();
    }

    /**
     * 批量插入
     * @param array $param
     * @return mixed
     */
    public function insert(array $param)
    {
        return $this->entity->insert($param);
    }

    /**
     * 根据条件查询单条数据
     * @param $where
     * @param array $columns
     * @return array
     */
    public function find(array $where, $columns= ['*'])
    {
        if (method_exists($this->entity, "setDeletedAt")) {
            $where = array_merge($where, [['deleted_at', self::IS, null]]);
        }
        $result = $this->entity::where($where)->first($columns);
        return $result ? ArrayHelper::toArray($result) : [];
    }

    /**
     * 根据条件查询多条数据
     * @param array $where
     * @param array $columns
     * @return array
     */
    public function get(array $where, $columns = ['*']) : array
    {
        if (method_exists($this->entity, "setDeletedAt")) {
            $where = array_merge($where, [['deleted_at', self::IS, null]]);
        }
        $result = $this->entity::where($where)->get($columns);
        return $result ? ArrayHelper::toArray($result) : [];
    }


    /**
     * 根据条件修改单条数据
     * @param array $data
     * @param array $where
     * @return mixed
     */
    public function update(array $data, array $where)
    {
        return $this->entity::where($where)->limit(1)->update($data);
    }

    /**
     * 根据条件修改多条数据
     * @param array $data
     * @param array $where
     * @return mixed
     */
    public function updateAll(array $data, array $where)
    {
        return $this->entity::where($where)->update($data);
    }


    /**
     * 根据 id 删除单条数据
     * @param int $id
     * @return mixed
     */
    public function dealete(int $id)
    {
        $data = [
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        $where = [
            'id' => $id
        ];
        return $this->entity::where($where)->update($data);
    }

}