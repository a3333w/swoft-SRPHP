<?php declare(strict_types=1);

namespace Swoft\Devtool\Listener;

use Swoft\Config\Annotation\Mapping\Config;
use Swoft\Console\Console;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;

/**
 * Class EventFireListener
 * @Listener("*")
 */
class EventFireListener implements EventHandlerInterface
{
    /**
     * @Config("devtool.logEventToConsole")
     * @var bool
     */
    public $logEventToConsole = false;

    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event): void
    {
        if (!$this->logEventToConsole) {
            return;
        }

        Console::log(
            \sprintf('Trigger the event <cyan>%s</cyan>', $event->getName()),
            [],
            'debug',
            [
                'Application',
                // 'WorkerId' => App::getWorkerId()
            ]
        );
    }
}
