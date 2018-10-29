<?php

namespace Phlash\Tests;

use Phlash\Arr;

class MapReduceTest extends TestCase
{
    public function testMapReduce()
    {
        $array = new Arr([
            ['foo' => 2],
            ['foo' => 4],
            ['foo' => 6],
            ['foo' => 8],
            ['foo' => 10],
        ]);

        $this->assertEquals(30, $array->mapReduce('foo', function ($value, $carry) {
            return $value + $carry;
        }));
    }
}
