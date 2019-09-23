<?php declare(strict_types=1);

namespace App\Bean;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class PrototypeClass
 *
 * @since 2.0
 *
 * @Bean(name="prototype", scope=Bean::PROTOTYPE, alias="pro")
 */
class PrototypeClass
{
    public function init()
    {
        return "initing!";
    }
}