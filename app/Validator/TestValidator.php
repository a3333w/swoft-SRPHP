<?php declare(strict_types=1);

namespace App\Validator;


use Swoft\Validator\Annotation\Mapping\IsString;
use Swoft\Validator\Annotation\Mapping\Length;
use Swoft\Validator\Annotation\Mapping\Validator;

/**
 * Class TestValidator
 * @Validator(name="TestValidator")
 */
class TestValidator
{
    /**
     * @IsString()
     * @var string
     */
    protected $token;



}