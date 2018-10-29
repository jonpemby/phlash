<?php

namespace Phlash\Tests;

use Phlash\Str;

class CharsTest extends TestCase
{
    public function testChars()
    {
        $chars = Str::from('hello world')->chars()->value();

        $this->assertSame(
            ['h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd'],
            $chars
        );
    }
}
