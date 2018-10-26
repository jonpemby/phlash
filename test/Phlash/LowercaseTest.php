<?php

namespace Phlash\Tests;

use Phlash\Str;

class LowercaseTest extends TestCase
{
    public function testLowercase()
    {
        $this->assertSame('foo bar', Str::from('Foo Bar')->lowercase()->value());
    }
}
