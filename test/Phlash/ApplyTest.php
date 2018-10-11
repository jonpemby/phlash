<?php

namespace Phlash\Tests;

use function Phlash\apply;
use Phlash\Func;
use Phlash\Tests\Support\Bindable;

class ApplyTest extends TestCase
{
    public function testApplyFunc()
    {
        $bindable = new Bindable(6);

        $times = function ($n) {
            return $this->value() * $n;
        };

        $this->assertEquals(12, Func::apply($bindable, $times, [2]));
    }

    public function testApplyFunction()
    {
        $bindable = new Bindable(6);

        $times = function ($n) {
            return $this->value() * $n;
        };

        $this->assertEquals(18, apply($bindable, $times, [3]));
    }
}
