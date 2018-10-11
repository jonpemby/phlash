<?php

namespace Phlash\Tests;

use function Phlash\tap;
use function Phlash\phlash;
use Phlash\Arr;
use Phlash\Tests\Support\Bindable;

class TapTest extends TestCase
{
    public function testTapCollection()
    {
        $collection = phlash([1, 2, 3, 4, 5]);

        $this->assertInstanceOf(
            Arr::class,
            $collection->tap(function ($c) {
                // do something
            })
        );
    }

    public function testTapFunction()
    {
        $bindable = new Bindable(5);

        $this->assertInstanceOf(
            Bindable::class,
            tap($bindable)->value(10)
        );

        $this->assertEquals(10, $bindable->value());
    }
}
