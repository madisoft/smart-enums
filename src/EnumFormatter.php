<?php

declare(strict_types=1);

namespace DBorsatto\SmartEnums;

use DBorsatto\SmartEnums\Exception\SmartEnumException;
use function array_flip;

class EnumFormatter
{
    /**
     * @var EnumFactory
     */
    private $factory;

    /**
     * @param string $enumClass
     * @psalm-param class-string<EnumInterface> $enumClass
     *
     * @throws SmartEnumException
     */
    public function __construct(string $enumClass)
    {
        $this->factory = new EnumFactory($enumClass);
    }

    /**
     * @return array<string, string>
     */
    public function toKeyValueList(): array
    {
        $list = $this->factory->all();

        $choices = [];
        foreach ($list as $enum) {
            $choices[$enum->getValue()] = $enum->getDescription();
        }

        return $choices;
    }

    public function toValueKeyList(): array
    {
        return array_flip($this->toKeyValueList());
    }
}
