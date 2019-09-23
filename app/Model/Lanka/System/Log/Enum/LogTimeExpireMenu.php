<?php
/**
 * @author liuqiaomu
 * @date 2019/9/19
 */
namespace App\Modle\Lanka\System\Log\Enum;

/**
 * Class LogTimeExpireMenu
 * 日志过期时间枚举
 * @package App\Modle\Lanka\System\Log\Enum
 */
class LogTimeExpireMenu
{
    /**
     * 一小时
     */
    const ONEDAY = 3600;

    /**
     * 一天
     */
    const ONEHOURS = 86400;



    public static $Enums = [
        self::ONEDAY => '一小时',
        self::ONEHOURS => '一天',
    ];
}