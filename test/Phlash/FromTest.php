<?php

namespace Phlash\Tests;

use Phlash\Arr;

class FromTest extends TestCase
{
    public function testFrom()
    {
        $array = Arr::from([1, 2, 3, 4, 5, 6]);

        $other = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame($other->value(), $array->value());
    }
}
