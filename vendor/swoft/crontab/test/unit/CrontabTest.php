<?php declare(strict_types=1);


namespace SwoftTest\Crontab\Unit;

use PHPUnit\Framework\TestCase;
use Swoft\Bean\BeanFactory;
use Swoft\Crontab\Crontab;
use Swoft\Crontab\Exception\CrontabException;
use SwoftTest\Crontab\Testing\TestCrontab;

/**
 * Class CrontabTest
 *
 * @since 2.0
 */
class CrontabTest extends TestCase
{
    /**
     * @throws CrontabException
     */
    public function testIndex()
    {
        /* @var Crontab $crontab */
        $crontab = BeanFactory::getBean("crontab");

        $crontab->execute("testCrontab", "method");

        /* @var TestCrontab $testCrontab */
        $testCrontab = BeanFactory::getBean("testCrontab");
        $testResult  = $testCrontab->getTest();

        $this->assertEquals('method', $testResult);
    }
}