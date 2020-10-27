<?php declare(strict_types=1);


namespace Swoft\Crontab;


use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Concern\PrototypeTrait;
use Swoft\Context\AbstractContext;

/**
 * Class CrontabContext
 *
 * @since 2.0
 *
 * @Bean(scope=Bean::PROTOTYPE)
 */
class CrontabContext extends AbstractContext
{
    use PrototypeTrait;

    /**
     * @var string
     */
    private $beanName;

    /**
     * @var string
     */
    private $methodName;

    /**
     * @param string $beanName
     * @param string $methodName
     *
     * @return CrontabContext
     */
    public static function new(string $beanName, string $methodName): self
    {
        $self = self::__instance();

        $self->beanName   = $beanName;
        $self->methodName = $methodName;

        return $self;
    }

    /**
     * @return string
     */
    public function getBeanName(): string
    {
        return $this->beanName;
    }

    /**
     * @return string
     */
    public function getMethodName(): string
    {
        return $this->methodName;
    }
}