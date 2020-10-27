<?php declare(strict_types=1);

namespace Swoft\Crontab\Annotaion\Parser;

use Swoft\Annotation\Annotation\Mapping\AnnotationParser;
use Swoft\Annotation\Annotation\Parser\Parser;
use Swoft\Crontab\Annotaion\Mapping\Cron;
use Swoft\Crontab\CrontabRegister;
use Swoft\Crontab\Exception\CrontabException;

/**
 * Class CronParser
 *
 * @since 2.0
 *
 * @AnnotationParser(annotation=Cron::class)
 */
class CronParser extends Parser
{
    /**
     * @param int $type
     * @param Cron $annotation
     *
     * @return array
     * @throws CrontabException
     */
    public function parse(int $type, $annotation): array
    {
        CrontabRegister::registerCron($this->className, $this->methodName, $annotation);

        return [];
    }
}
