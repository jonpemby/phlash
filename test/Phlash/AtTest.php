<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\at;

class AtTest extends TestCase
{
    public function testAtArr()
    {
        $array = new Arr([1, 2, 3]);

        $this->assertEquals(1, $array->at(0));
        $this->assertEquals(2, $array->at(1));
        $this->assertEquals(3, $array->at(2));

        $this->assertNull($array->at(3));
    }

    public function testAtFunction()
    {
        $array = [1, 2, 3];

        $this->assertEquals(1, at($array, 0));
        $this->assertEquals(2, at($array, 1));
        $this->assertEquals(3, at($array, 2));

        $this->assertNull(at($array, 3));
    }
}
