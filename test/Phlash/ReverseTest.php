<?php

namespace Phlash\Tests;

use Phlash\Arr;

class ReverseTest extends TestCase
{
    public function testReverse()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame([6, 5, 4, 3, 2, 1], $array->reverse()->value());
    }
}
