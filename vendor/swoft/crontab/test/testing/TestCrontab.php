<?php declare(strict_types=1);


namespace SwoftTest\Crontab\Testing;

use Swoft\Crontab\Annotaion\Mapping\Cron;
use Swoft\Crontab\Annotaion\Mapping\Scheduled;

/**
 * Class TestCrontab
 *
 * @since 2.0
 *
 * @Scheduled("testCrontab")
 */
class TestCrontab
{
    /**
     * @var string
     */
    private $test;

    /**
     * @Cron(value="*")
     *
     * @return array
     */
    public function method(): void
    {
        $this->test = "method";
    }

    /**
     * @return string
     */
    public function getTest(): string
    {
        return $this->test;
    }
}