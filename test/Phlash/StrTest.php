<?php

namespace Phlash\Tests;

use Phlash\Str;

class StrTest extends TestCase
{
    public function testNew()
    {
        $this->assertInstanceOf(Str::class, new Str);
    }

    public function testStub()
    {
        $this->assertInstanceOf(Str::class, Str::from('new'));
    }
}
