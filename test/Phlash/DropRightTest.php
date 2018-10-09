<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\dropRight;

class DropRightTest extends TestCase
{
    public function testDropRightArr()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $dropped = $array->dropRight(3);

        $this->assertCount(3, $dropped);

        $this->assertEquals(1, $dropped->at(0));
        $this->assertEquals(2, $dropped->at(1));
        $this->assertEquals(3, $dropped->at(2));
    }

    public function testDropRightFunction()
    {
        $array = [1, 2, 3, 4, 5, 6];

        $dropped = dropRight($array, 3);

        $this->assertCount(3, $dropped);

        $this->assertEquals(1, $dropped[0]);
        $this->assertEquals(2, $dropped[1]);
        $this->assertEquals(3, $dropped[2]);
    }
}

