<?php

namespace Phlash\Tests;

use function Phlash\once;
use Phlash\Func;

class OnceTest extends TestCase
{
    public function testOnce()
    {
        $fn = Func::once(function ($a, $b, $c) {
            return $a + $b + $c;
        });

        $this->assertEquals(42, $fn(10, 12, 20));
        $this->assertEquals(42, $fn(10, 13, 14));
    }

    public function testOnceFunc()
    {
        $fn = once(function ($a, $b, $c) {
            return $a + $b + $c;
        });

        $this->assertEquals(42, $fn(10, 12, 20));
        $this->assertEquals(42, $fn(10, 13, 14));
    }
}
