<?php declare(strict_types=1);


namespace App\Aspect;

use Swoft\Aop\Annotation\Mapping\AfterReturning;
use Swoft\Aop\Annotation\Mapping\AfterThrowing;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Point\JoinPoint;
use Swoft\Aop\Point\ProceedingJoinPoint;

/**
 * Class DemoAspect
 *
 * @since 2.0
 *
 * @Aspect(order=2)
 * @PointBean(include={"App\Http\Controller\TestExecTimeController"})
 */
class DemoAspect
{
    /**
     * @Before()
     */
    public function before()
    {
        echo "this is before\r\n";
    }

    /**
     * @After()
     */
    public function after()
    {
        echo "this is after\r\n";
    }
}