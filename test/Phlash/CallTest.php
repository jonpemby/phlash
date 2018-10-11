<?php

namespace Phlash\Tests;

use function Phlash\call;
use Phlash\Func;
use Phlash\Tests\Support\Bindable;

class CallTest extends TestCase
{
    public function testCallFunc()
    {
        $bindable = new Bindable(6);

        $times = function ($n) {
            return $this->value() * $n;
        };

        $this->assertEquals(12, Func::call($bindable, $times, 2));
    }

    public function testCallFunction()
    {
        $bindable = new Bindable(6);

        $times = function ($n) {
            return $this->value() * $n;
        };

        $this->assertEquals(18, call($bindable, $times, 3));
    }
}
