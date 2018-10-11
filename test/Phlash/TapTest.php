<?php

namespace Phlash\Tests;

use function Phlash\phlash;
use Phlash\Arr;

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
}
