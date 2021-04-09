<?php

declare(strict_types=1);

namespace DBorsatto\SmartEnums\Tests\Stub;

use DBorsatto\SmartEnums\Bridge\Doctrine\Type\AbstractEnumType;

class DoctrineEnumType extends AbstractEnumType
{
    /**
     * @var string
     */
    private $enumClass = '';

    public static function createForEnum(string $enumClass): self
    {
        $type = new self();
        $type->enumClass = $enumClass;

        return $type;
    }

    protected function getEnumClass(): string
    {
        return $this->enumClass;
    }

    public function getName(): string
    {
        return 'enum';
    }
}
