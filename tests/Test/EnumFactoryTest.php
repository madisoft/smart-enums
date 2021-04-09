<?php

declare(strict_types=1);

namespace DBorsatto\SmartEnums\Tests\Test;

use DBorsatto\SmartEnums\EnumFactory;
use DBorsatto\SmartEnums\Exception\SmartEnumException;
use DBorsatto\SmartEnums\Tests\Stub\Enum;
use PHPUnit\Framework\TestCase;
use stdClass;

class EnumFactoryTest extends TestCase
{
    public function testThrowsAnExceptionIfEnumClassIsNotValid(): void
    {
        $this->expectException(SmartEnumException::class);

        new EnumFactory(stdClass::class);
    }

    public function testForwardsCallsToEnumClass(): void
    {
        $factory = new EnumFactory(Enum::class);

        $this->assertEquals($factory->fromValue('value1'), Enum::fromValue('value1'));
        $this->assertEquals($factory->fromValues(['value1']), Enum::fromValues(['value1']));
        $this->assertEquals($factory->all(), Enum::all());
    }

    public function testThrowsAnExceptionWhenCreatingEnumFromUnsupportedValue(): void
    {
        $this->expectException(SmartEnumException::class);

        $factory = new EnumFactory(Enum::class);
        $factory->fromValue(Enum::UNSUPPORTED_VALUE);
    }

    public function testThrowsAnExceptionWhenCreatingEnumFromUnsupportedValues(): void
    {
        $this->expectException(SmartEnumException::class);

        $factory = new EnumFactory(Enum::class);
        $factory->fromValues([Enum::UNSUPPORTED_VALUE]);
    }
}
