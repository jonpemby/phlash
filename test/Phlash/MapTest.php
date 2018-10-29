<?php

namespace Phlash\Tests;

use Phlash\Arr;

class MapTest extends TestCase
{
    public function testMap()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame(
            [2, 4, 6, 8, 10, 12],
            $array->map(function ($n) {
                return 2 * $n;
            })->value()
        );
    }
}
