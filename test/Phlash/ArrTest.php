<?php

namespace Phlash\Tests;

use Phlash\Arr;
use Phlash\Obj;

class ArrTest extends TestCase
{
    public function testNewArr()
    {
        $array = new Arr();

        $this->assertCount(0, $array);
    }

    public function testHighOrderGet()
    {
        $array = new Arr([
            ['foo' => 1],
            ['foo' => 2],
            ['foo' => 3],
            ['foo' => 4],
            ['foo' => 5],
            ['foo' => 6],
        ]);

        $this->assertSame([1, 2, 3, 4, 5, 6], $array->foo->value());

        $array = new Arr([
            new Obj(['foo' => 1]),
            new Obj(['foo' => 2]),
            new Obj(['foo' => 3]),
            new Obj(['foo' => 4]),
            new Obj(['foo' => 5]),
            new Obj(['foo' => 6]),
        ]);

        $this->assertSame([1, 2, 3, 4, 5, 6], $array->foo->value());
    }  
}

