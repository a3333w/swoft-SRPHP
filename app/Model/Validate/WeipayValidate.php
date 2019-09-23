<?php
namespace App\Model\Validate;

use Swoft\Validator\Annotation\Mapping\IsInt;
use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\IsArray;
use Swoft\Validator\Annotation\Mapping\Validator;

/**
 * Class OrderValidate
 *
 * @since 2.0
 *
 * @Validator(name="WeipayValidate")
 */
class WeipayValidate
{
    /**
     * @isInt()
     *
     * @var int
     */
    protected $id;

    /**
     * @IsString()
     *
     * @var string
     */
    protected $openid;
}