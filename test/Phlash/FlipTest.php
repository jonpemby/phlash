<?php

namespace Phlash\Tests;

use function Phlash\flip;
use Phlash\Func;

class FlipTest extends TestCase
{
    public function testFlip()
    {
        $fn = Func::flip(function ($a, $b) {
            return $a . $b;
        });

        $this->assertEquals('barfoo', $fn('foo', 'bar'));
    }
    
    public function testFlipFunc()
    {
        $fn = flip(function ($a, $b) {
            return $a . $b;
        });

        $this->assertEquals('barfoo', $fn('foo', 'bar'));
    }
}

