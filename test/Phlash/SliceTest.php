<?php

namespace Phlash\Tests;

use Phlash\Arr;

class SliceTest extends TestCase
{
    public function testSlice()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame([1, 2, 3], $array->slice(0, 3)->value());
        $this->assertSame([2, 3, 4, 5], $array->slice(1, 5)->value());
        $this->assertSame([4, 5, 6], $array->slice(3)->value());
    }
}
