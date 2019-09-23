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
 * @Validator(name="OrderValidate")
 */
class OrderValidate
{
    /**
     * @IsInt()
     *
     * @var int
     */
    protected $custom_id;

    /**
     * @IsString()
     *
     * @var string
     */
    protected $username;

    /**
     * @IsArray()
     *
     * @var array
     */
    protected $addressInfo;
}