<?php
namespace App\Model\Validate;

use Swoft\Validator\Annotation\Mapping\IsInt;
use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\Min;
use Swoft\Validator\Annotation\Mapping\Mobile;
use Swoft\Validator\Annotation\Mapping\Validator;

/**
 * Class ParamsValidator
 *
 * @since 2.0
 *
 * @Validator(name="CartValidate")
 */
class CartValidate
{
    /**
     * @IsInt()
     *
     * @var int
     */
    protected $goods_id;

    /**
     * @IsInt()
     * @min(1)
     *
     * @var int
     */
    protected $goods_num;

    /**
     * @IsInt()
     *
     * @var int
     */
    protected $uid;
}