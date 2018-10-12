<?php

namespace Phlash\Tests;

use function Phlash\random;
use Phlash\Num;

/**
 * @todo
 * Not a *great* way to test random numbers. Need to come up with a better way.
 */
class RandomNumberTest extends TestCase
{
    public function testRandomNum()
    {
        $this->assertInternalType('int', Num::random(1, 50)->value());
        $this->assertLessThan(51, Num::random(1, 50)->value());
        $this->assertGreaterThan(0, Num::random(1, 50)->value());

        $this->assertInternalType('float', Num::random(1, 50, true)->value());
        $this->assertLessThan(51.00, Num::random(1, 50, true)->value());
        $this->assertGreaterThan(0.99, Num::random(1, 50, true)->value());
    }

    public function testRandomFunction()
    {
        $this->assertInternalType('int', random(1, 50));
        $this->assertLessThan(51, random(1, 50));
        $this->assertGreaterThan(0, random(1, 50));

        $this->assertInternalType('float', random(1, 50, true));
        $this->assertLessThan(50.001, random(1, 50, true));
        $this->assertGreaterThan(0.99, random(1, 50));
    }
}

