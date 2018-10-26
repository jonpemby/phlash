<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\fill;

class FillTest extends TestCase
{
    public function testFill()
    {
        $array = Arr::from([])->fill(null, 0, 6);

        $this->assertSame([null, null, null, null, null, null], $array->value());
    }

    public function testFillFrom()
    {
        $array = Arr::from([1, 2, 3, 4, 5, 6])->fill(null, 3);

        $this->assertSame([1, 2, 3, null, null, null], $array->value());
    }

    public function testFillTo()
    {
        $array = Arr::from([1, 2, 3, 4, 5, 6])->fill(null, 0, 3);

        $this->assertSame([null, null, null, 4, 5, 6], $array->value());
    }

    public function testFillFunc()
    {
        $this->assertSame([null, null, null], fill([], null, 0, 3));
    }
}
