<?php declare(strict_types=1);


namespace Swoft\Crontab\Process;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
use Swoft\Crontab\Crontab;
use Swoft\Exception\SwoftException;
use Swoft\Process\Process;
use Swoft\Process\UserProcess;

/**
 * Class CrontabProcess
 *
 * @since 2.0
 *
 * @Bean()
 */
class CrontabProcess extends UserProcess
{
    /**
     * @Inject("crontab")
     *
     * @var Crontab
     */
    private $crontab;


    /**
     * @param Process $process
     *
     * @throws SwoftException
     */
    public function run(Process $process): void
    {
        // Tick task
        $this->crontab->tick();

        // Exe task
        $this->crontab->dispatch();
    }
}