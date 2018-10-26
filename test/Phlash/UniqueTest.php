<?php

namespace Phlash\Tests;

use Phlash\Arr;

class UniqueTest extends TestCase
{
    public function testUnique()
    {
        $array = new Arr([1, 2, 5, 4, 2, 3, 4, 5, 6, 1]);

        $this->assertSame([1, 2, 5, 4, 3, 6], $array->unique()->value());
    }
}
