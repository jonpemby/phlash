<?php

namespace Phlash\Tests;

use Phlash\Func;

class AryTest extends TestCase
{
    public function testAryFunc()
    {
        $func = function ($a, $b, $c, $d = null, $e = null, $f = null) {
            return $a + $b + $c + $d + $e + $f;
        };

        $this->assertEquals(21, $func(1, 2, 3, 4, 5, 6));

        $aried = Func::ary($func, 3);

        $this->assertEquals(6, $aried(1, 2, 3, 4, 5, 6));
    }
}
