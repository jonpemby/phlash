<?php

namespace Phlash\Tests;

use Phlash\Arr;
use Phlash\Obj;
use Phlash\Str;
use function Phlash\phlash;

class PhlashTest extends TestCase
{
    public function testPhlash()
    {
        $this->assertInstanceOf(Arr::class, phlash([1, 2, 3, 4, 5]));
        $this->assertInstanceOf(Obj::class, phlash(new \stdClass));
        $this->assertInstanceOf(Str::class, phlash('hello world'));
    }
}
