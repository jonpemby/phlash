<?php

namespace Phlash\Tests;

use Phlash\Func;
use Phlash\Tests\Support\Bindable;

class ApplyTest extends TestCase
{
    public function testApply()
    {
        $bindable = new Bindable(6);

        $times = function ($n) {
            return $this->value() * $n;
        };

        $this->assertEquals(12, Func::apply($bindable, $times, [2]));
    }
}
