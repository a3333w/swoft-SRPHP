<?php declare(strict_types=1);

namespace App\Listener;

use ReflectionException;
use Swoft\Bean\Exception\ContainerException;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Swoft\Log\Helper\CLog;
use Swoft\Server\Swoole\SwooleEvent;

/**
 * Class MasterStartListener
 *
 * @Listener(SwooleEvent::START)
 */
class MasterStartListener implements EventHandlerInterface
{
    /**
     * @param EventInterface $event
     *
     * @throws ReflectionException
     * @throws ContainerException
     */
    public function handle(EventInterface $event): void
    {
        CLog::info('master started1111111111111111');
    }
}