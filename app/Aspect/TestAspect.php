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
 * Class TestAspect
 *
 * @since 2.0
 *
 * @Aspect(order=1)
 * @PointBean(include={"App\Http\Controller\TestExecTimeController"})
 */
class TestAspect
{
    /**
     * @Before()
     */
    public function before()
    {
        echo "this is hello\r\n";
    }

    /**
     * @After()
     */
    public function after()
    {
        echo "this is world\r\n";
    }
}