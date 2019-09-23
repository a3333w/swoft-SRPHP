<?php
namespace App\Model\Validate;

use Swoft\Validator\Annotation\Mapping\IsInt;
use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\Validator;

/**
 * Class ParamsValidator
 *
 * @since 2.0
 *
 * @Validator(name="BlockParamsValidator")
 */
class BlockParamsValidator
{
    /**
     * @IsInt()
     *
     * @var int
     */
    protected $block_id = 0;

    /**
     * @IsInt()
     *
     * @var int
     */
    protected $page = 1;

    /**
     * @IsInt()
     *
     * @var int
     */
    protected $per_page = 0;


}