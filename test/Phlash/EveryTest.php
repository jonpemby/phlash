<?php

namespace Phlash\Tests;

use function Phlash\every;
use Phlash\Arr;

class EveryTest extends TestCase
{
    public function testEvery()
    {
        $this->assertTrue(Arr::from([1, 2, 3, 4, 5, 6])->every(function ($value) {
            return $value < 10;
        }));

        $this->assertFalse(Arr::from([0, 5, 10, 15, 20, 25])->every(function ($value) {
            return $value < 20;
        }));
    }

    public function testEveryFunction()
    {
        $this->assertTrue(every([1, 2, 3, 4, 5, 6], function ($value) {
            return $value < 10;
        }));

        $this->assertFalse(every([0, 5, 10, 15, 20, 25], function ($value) {
            return $value < 20;
        }));
    }
}

