<?php

namespace Phlash\Tests;

use Phlash\Arr;

class ReduceTest extends TestCase
{
    public function testReduce()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertEquals(21, $array->reduce(function ($value, $carry) {
            return $value + $carry;
        }));

        $this->assertEquals(25, $array->reduce(4, function ($value, $carry) {
            return $value + $carry;
        }));
    }
}
