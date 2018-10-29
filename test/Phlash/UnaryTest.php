<?php

namespace Phlash\Tests;

use Phlash\Func;

class UnaryTest extends TestCase
{
    public function testUnary()
    {
        $func = function ($a, $b = null, $c = null)
        {
            return $a + $b + $c;
        };

        $this->assertEquals(6, $func(1, 2, 3));

        $unary = Func::unary($func);

        $this->assertEquals(1, $unary(1, 2, 3));
    }
}
