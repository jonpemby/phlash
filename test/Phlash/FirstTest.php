<?php

namespace Phlash\Tests;

use Phlash\Arr;

class FirstTest extends TestCase
{
    public function testFirst()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertEquals(1, $array->first());
        $this->assertEquals(1, $array->head()); // @alias
    }
}
