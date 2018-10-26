<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\dropRightWhile;

class DropRightWhileTest extends TestCase
{
    public function testDropRightWhile()
    {
        $array = Arr::from([1, 2, 3, 4, 5, 6])->dropRightWhile(function ($n) {
            return $n > 3;
        });

        $this->assertSame([1, 2, 3], $array->value());
    }

    public function testDropRightWhileDoesNotInfiniteLoopOrError()
    {
        $array = Arr::from([1, 2, 3, 4, 5, 6])->dropRightWhile(function ($n) {
            return true;
        });

        $this->assertSame([], $array->value());
    }

    public function testDropRightWhileFunc()
    {
        $array = [1, 2, 3, 4, 5, 6];

        $this->assertSame([1, 2, 3], dropRightWhile($array, function ($n) {
            return $n > 3;
        }));
    }
}
