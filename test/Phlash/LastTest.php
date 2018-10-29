<?php

namespace Phlash\Tests;

use Phlash\Arr;

class LastTest extends TestCase
{
    public function testLast()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertEquals(6, $array->last());
        $this->assertEquals(6, $array->tail());
    }
}
