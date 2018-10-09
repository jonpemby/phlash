<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\drop;

class DropTest extends TestCase
{
    public function testDropArr()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $dropped = $array->drop(3);

        $this->assertCount(3, $dropped);

        $this->assertEquals(4, $dropped->at(0));
        $this->assertEquals(5, $dropped->at(1));
        $this->assertEquals(6, $dropped->at(2));
    }

    public function testDropFunction()
    {
        $array = [1, 2, 3, 4, 5, 6];

        $dropped = drop($array, 3);

        $this->assertCount(3, $dropped);

        $this->assertEquals(4, $dropped[0]);
        $this->assertEquals(5, $dropped[1]);
        $this->assertEquals(6, $dropped[2]);
    }
}
