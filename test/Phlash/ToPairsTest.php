<?php

namespace Phlash\Tests;

use function Phlash\toPairs;
use Phlash\Obj;

class ToPairsTest extends TestCase
{
    public function testToPairsObj()
    {
        $obj = new Obj(['a' => 1, 'b' => 2, 'c' => 3]);

        $this->assertSame(
            [['a', 1], ['b', 2], ['c', 3]],
            $obj->toPairs()->value()
        );
    }

    public function testToPairsFunc()
    {
        $obj = ['a' => 1, 'b' => 2, 'c' => 3];

        $this->assertSame(
            [['a', 1], ['b', 2], ['c', 3]],
            toPairs($obj)
        );
    }
}
