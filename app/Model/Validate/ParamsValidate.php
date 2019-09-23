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
 * @Validator(name="ParamsValidator")
 */
class ParamsValidate
{
    /**
     * @IsInt(message="礼包必须传递且字符串")
     *
     * @var int
     */
    protected $package_id = 0;

    /**
     * @IsString()
     *
     * @var string
     */
    protected $goods_id;

    /**
     * @IsInt()
     * @Min()
     *
     * @var int
     */
    protected $goods_num= 0;

    /**
     * @IsString()
     *
     * @var string
     */
    protected $gid = 0;

    /**
     * @IsString()
     *
     * @var string
     */
    protected $province = '';

    /**
     * @IsString()
     *
     * @var string
     */
    protected $city = '';

    /**
     * @IsString()
     *
     * @var string
     */
    protected $area = '';

    /**
     * @IsString()
     *
     * @var string
     */
    protected $address = '';

    /**
     * @IsInt()
     *
     * @var int
     */
    protected $jid = 0;

    /**
     * @IsInt()
     *
     * @var int
     */
    protected $account = 0;

    /**
     * @IsInt()
     *
     * @var int
     */
    protected $donate_id = 0;

    /**
     * @IsString()
     * @Mobile()
     *
     * @var string
     */
    protected $mobile;

    /**
     * @IsInt()
     *
     * @var int
     */
    protected $code;



}