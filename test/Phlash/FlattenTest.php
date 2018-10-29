<?php

namespace Phlash\Tests;

use Phlash\Arr;

class FlattenTest extends TestCase
{
    public function testFlatten()
    {
        $array = new Arr([1, [2, 3, 4], 5, 6]);

        $this->assertSame(
            [1, 2, 3, 4, 5, 6],
            $array->flatten()->value()
        );
    }
}
