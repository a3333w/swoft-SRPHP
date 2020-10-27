<?php declare(strict_types=1);


namespace Swoft\Crontab;

/**
 * Class CrontabEvent
 *
 * @since 2.0
 */
class CrontabEvent
{
    /**
     * Before
     */
    public const BEFORE_CRONTAB = 'swoft.crontab.crontab.before';

    /**
     * After
     */
    public const AFTER_CRONTAB = 'swoft.crontab.crontab.after';
}