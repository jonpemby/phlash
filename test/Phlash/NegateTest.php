<?php

namespace Phlash\Tests;

use function Phlash\negate;
use Phlash\Func;

class NegateTest extends TestCase
{
    public function testNegateFunc()
    {
        $pred = function () {
            return false;
        };

        $negated = Func::negate($pred);

        $this->assertTrue($negated());
    }

    public function testNegateFunction()
    {
        $pred = function () {
            return false;
        };

        $negated = negate($pred);

        $this->assertTrue($negated());
    }
}

