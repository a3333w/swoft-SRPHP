<?php declare(strict_types=1);

namespace Swoft\Crontab;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\BeanFactory;
use Swoft\Crontab\Exception\CrontabException;
use Swoft\Exception\SwoftException;
use Swoft\Stdlib\Helper\PhpHelper;
use Swoft\Timer;
use Swoole\Coroutine;
use Swoole\Coroutine\Channel;

/**
 * Class Crontab
 *
 * @since 2.0
 *
 * @Bean(name="crontab")
 */
class Crontab
{
    /**
     * Seconds
     *
     * @var float
     */
    private $tickTime = 1;

    /**
     * @var int
     */
    private $maxTask = 10;

    /**
     * @var Channel
     */
    private $channel;

    /**
     * Init
     */
    public function init(): void
    {
        $this->channel = new Channel($this->maxTask);
    }

    /**
     * Tick task
     *
     * @throws SwoftException
     */
    public function tick(): void
    {
        Timer::tick($this->tickTime * 1000, function () {
            // All task
            $tasks = CrontabRegister::getCronTasks();

            // Push task to channel
            foreach ($tasks as $task) {
                $this->channel->push($task);
            }
        });
    }

    /**
     * Exec task
     */
    public function dispatch(): void
    {
        while (true) {
            $task = $this->channel->pop();

            Coroutine::create(function () use ($task) {
                [$beanName, $methodName] = $task;

                //Before
                \Swoft::trigger(CrontabEvent::BEFORE_CRONTAB, $this, $beanName, $methodName);

                // Execute task
                $this->execute($beanName, $methodName);

                //Before
                \Swoft::trigger(CrontabEvent::AFTER_CRONTAB, $this, $beanName, $methodName);
            });
        }
    }

    /**
     * @param string $beanName
     * @param string $methodName
     *
     * @throws CrontabException
     */
    public function execute(string $beanName, string $methodName): void
    {
        $object = BeanFactory::getBean($beanName);

        if (!method_exists($object, $methodName)) {
            throw new CrontabException(
                sprintf('Crontab(name=%s method=%s) method is not exist!', $beanName, $methodName)
            );
        }


        PhpHelper::call([$object, $methodName]);
    }
}
