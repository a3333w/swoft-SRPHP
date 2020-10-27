<?php declare(strict_types=1);

namespace Swoft\Crontab;

use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class CrontabFormat
 *
 * @since 2.0
 *
 * @Bean()
 */
class CrontabExpression
{
    /**
     * @param string $crontab
     *
     * @return bool
     */
    public static function parse(string $crontab): bool
    {
        $cronParts = preg_split('/\s/', $crontab, -1, PREG_SPLIT_NO_EMPTY);
        if (count($cronParts) < 1 || count($cronParts) > 6) {
            return false;
        }
        foreach ($cronParts as $key => $cronPart) {
            $pattern = '/^\d$|^\*$|^\?$|^\d+\-\d+$|^[\d\*]+\/\d+$|^\d[\,\d\,]*\d$/i';
            if (!preg_match($pattern, $cronPart) || !self::checkItem($key, $cronPart)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param int $key
     * @param string $value
     *
     * @return bool
     */
    protected static function checkItem(int $key, string $value): bool
    {
        switch ($key) {
            case 0://sec
            case 1://min
                if (!self::checkCronItem($value, 0, 59)) {
                    return false;
                }
                break;
            case 2://hour
                if (!self::checkCronItem($value, 0, 23)) {
                    return false;
                }
                break;
            case 3://day
                if (!self::checkCronItem($value, 1, 31)) {
                    return false;
                }
                break;
            case 4://month
                if (!self::checkCronItem($value, 1, 12)) {
                    return false;
                }
                break;
            case 5://week
                if (!self::checkCronItem($value, 0, 6)) {
                    return false;
                }
                break;
            default:
                return false;
        }
        return true;
    }

    /**
     * @param string $value
     *
     * @param int $rangeStart
     * @param int $rangeEnd
     *
     * @return bool
     */
    protected static function checkCronItem(string $value, int $rangeStart, int $rangeEnd): bool
    {
        if ('*' === $value || '?' === $value) {
            return true;
        }
        if (strpos($value, '/') !== false) {
            str_replace('*', '0', '$value');
            list($start, $end) = explode('/', $value);
            if (!ctype_digit($start) || !ctype_digit($end)) {
                return false;
            }
            if ($start < $rangeStart || $end > $rangeEnd) {
                return false;
            }
        }
        if (strpos($value, '-') !== false) {
            list($start, $end) = explode('-', $value);
            if (!ctype_digit($start) || !ctype_digit($end)) {
                return false;
            }
            if ($start < $rangeStart || $end > $rangeEnd || $end < $start) {
                return false;
            }
        }
        if (strpos($value, ',') !== false) {
            $items = explode(',', $value);
            foreach ($items as $item) {
                if (!ctype_digit($item)) {
                    return false;
                }
                if ($item < $rangeStart || $item > $rangeEnd) {
                    return false;
                }
            }
        }
        if (!ctype_digit($value) && $value < $rangeStart || $value > $rangeEnd) {
            return false;
        }
        return true;
    }

    /**
     * @param string $cronExpress
     *
     * @return array
     */
    public static function parseCronItem(string $cronExpress): array
    {
        $cronItems = preg_split('/\s/', $cronExpress, -1, PREG_SPLIT_NO_EMPTY);
        $times = array();
        $maxLimit=[59,59,23,31,12,6];
        foreach ($cronItems as $k => $item) {
            if ('*' === $item || '?' === $item) {
                $times [$k] = $item;
            }
            if (strpos($item, '/') !== false) {
                str_replace('*', '0', '$value');
                list($start, $end) = explode('/', $item);
                while ($start <= $maxLimit[$k]) {
                    $times [$k][] = $start;
                    $start += $end;
                }
            }
            if (strpos($item, '-') !== false) {
                list($start, $end) = explode('-', $item);
                $times[$k] = range($start, $end);
            }
            if (strpos($item, ',') !== false) {
                $times[$k] = explode(',', $item);
            }
            if (ctype_digit($item)) {
                $times[$k][] = $item;
            }
        }
        return $times;
    }

    /**
     * @param string $cron
     * @param int $time
     *
     * @return bool
     */
    public static function parseObj(string $cron, int $time = null): bool
    {
        $startTime = $time ?? time();

        $date[] = (int)date('s', $startTime);
        $date[] = (int)date('i', $startTime);
        $date[] = (int)date('H', $startTime);
        $date[] = (int)date('d', $startTime);
        $date[] = (int)date('m', $startTime);
        $date[] = (int)date('w', $startTime);
        $parsedDate = self::parseCronItem($cron);

        foreach ($parsedDate as $k => $cronItem) {
            if ($cronItem === '*' || $cronItem === '?') {
                continue;
            }
            if (!in_array($date[$k], $cronItem)) {
                return false;
            }
        }

        return true;
    }
}
