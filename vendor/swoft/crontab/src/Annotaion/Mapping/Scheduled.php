<?php declare(strict_types=1);

namespace Swoft\Crontab\Annotaion\Mapping;

/**
 * Class Scheduled
 *
 * @since 2.0
 *
 * @Annotation
 * @Target("CLASS")
 * @Attributes({
 *     @Attribute("name", type="string")
 * })
 */
class Scheduled
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * Validator constructor.
     *
     * @param array $values
     */
    public function __construct(array $values)
    {
        if (isset($values['value'])) {
            $this->name = $values['value'];
        }
        if (isset($values['name'])) {
            $this->name = $values['name'];
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
