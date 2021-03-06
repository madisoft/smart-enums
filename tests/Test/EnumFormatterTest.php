<?php

declare(strict_types=1);

namespace Madisoft\SmartEnums\Tests\Test;

use Madisoft\SmartEnums\EnumFormatter;
use Madisoft\SmartEnums\Exception\SmartEnumException;
use Madisoft\SmartEnums\Tests\Stub\Enum;
use PHPUnit\Framework\TestCase;
use stdClass;
use function array_flip;

class EnumFormatterTest extends TestCase
{
    public function testThrowsAnExceptionIfEnumClassIsNotValid(): void
    {
        $this->expectException(SmartEnumException::class);

        new EnumFormatter(stdClass::class);
    }

    public function testCreatesKeyValueArrayFromEnumClass(): void
    {
        $formatter = new EnumFormatter(Enum::class);

        $this->assertSame(Enum::VALUES, $formatter->toKeyValueList());
    }

    public function testCreatesValueKeyArrayFromEnumClass(): void
    {
        $formatter = new EnumFormatter(Enum::class);

        $this->assertSame(array_flip(Enum::VALUES), $formatter->toValueKeyList());
    }
}
