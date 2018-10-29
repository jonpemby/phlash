<?php

namespace Phlash\Tests;

use Phlash\Str;

class WordsTest extends TestCase
{
    public function testWords()
    {
        $words = Str::from('hello world')->words();

        $this->assertSame(['hello', 'world'], $words->value());
    }
}
