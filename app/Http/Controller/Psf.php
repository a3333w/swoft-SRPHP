<?php
/**
 * 服务调用类
 * User: liuqiaomu
 * Date: 2019/07/05
 * Time: 09:53
 */

namespace App\Http\Controller;

use Swoft;
use Swoft\Log\Helper\CLog;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;

/**
 * Class Psf
 *
 * @since 2.0
 *
 * @Bean(name="psf", scope=Bean::PROTOTYPE, alias="pro")
 */

class Psf
{
    /**
     * 服务分组
     *
     * @var string
     */
    private $group = '';

    /**
     * 客户端环境变量
     *
     * @var array
     */
    private $env = array();

    /**
     * 设置服务分组
     *
     * @param string $group
     * @return $this
     */
    public function group($group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * 设置客户端环境变量
     *
     * @param mixed $key
     * @param mixed $val
     * @return $this
     */
    public function env($key, $val)
    {
        if (is_array($key)) {
            $this->env = $key;
        } else {
            $this->env[$key] = $val;
        }

        return $this;
    }

    /**
     * 发起调用
     *
     * @param string $serviceName
     * @param array $params
     * @param array $constructParams
     * @return Result
     * @throws \Exception
     */
    public function call(string $serviceName, $params = array(), $constructParams = array())
    {
        $resultObj = new Result();    //结果对象

        //strpos 查找 :: 出现的位置， 如果没有 抛出异常
        if (strpos($serviceName, '::') === false) {
            throw new \Exception('method cannot be empty', 9000);
            //将以 $serviceName 以左右两边的的值赋予变量$className 和$method
        }

        list($className, $method) = explode('::', $serviceName);

        //获得这个容器类
        $class = Swoft::getBean($className);

        //结果对象的结果属性 为 类的类方法（参数）返回的结果
        $resultObj->result = $class->$method(...$params);

        if(is_object($resultObj->result)){
            $resultObj->result = Swoft\Stdlib\Helper\ArrayHelper::toArray($resultObj->result);
        }

            if ($resultObj->result != 0 && is_array($resultObj->result)) {

                $errorContext = array_merge($resultObj->result, ["serviceName" => $serviceName]);
                CLog::error("psf call service failed", $errorContext);
            }

        return $resultObj;
    }
}

/**
 * 结果对象
 *
 * @package LaravelPsf
 */
class Result
{
    public $result = array();

    public function getResult()
    {
        return $this->result;
    }
}