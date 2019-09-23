<?php declare(strict_types=1);

namespace App\Aspect;

use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Point\JoinPoint;


/**
 * AOP切面类
 *
 * @since 2.0
 *
 * 声明切面类
 * @Aspect(order=3)
 *
 * 声明为 PointBean 类型的切面
 * @PointBean(include={"App\Http\Controller\TestExecTimeController"})
 */
class CalcExecTimeAspect
{
    protected $start;

    /**
     * 定义通知点
     * @Before()
     */
    public function before()
    {
        echo "this is wonima \r\n";
        $this->start = microtime(true);
    }

    /**
     * 定义通知点
     * @After()
     */
    public function after(JoinPoint $joinPoint)
    {
        $request = $joinPoint->getArgs()[2];

        $method = $joinPoint->getMethod();
        $after = microtime(true);
        $runtime = ($after - $this->start) * 1000;

        echo "{$method} 方法，本次执行时间为: {$runtime}ms\n";
    }
}