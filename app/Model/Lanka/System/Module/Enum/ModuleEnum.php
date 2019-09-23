<?php
/**
 * @author liuqiaomu
 * @date 2019/8/16
 */
namespace App\Model\Lanka\System\Module\Enum;

/**
 * Class ExtensionPlanConditionTypeEnum
 * 展期方案先决条件类型枚举
 * @package App\EMao\ScfProductEnums
 */
class ModuleEnum
{
    /**
     * 缴纳本金
     */
    const PAYMENTPRINCIPAL = 1;

    /**
     * 补缴保证金
     */
    const BACKDEPOSIT = 2;

    /**
     * 移车
     */
    const MOVECAR = 3;

    public static $Enums = [
        self::PAYMENTPRINCIPAL => '缴纳本金',
        self::BACKDEPOSIT => '补缴保证金',
        self::MOVECAR => '移车',
    ];
}