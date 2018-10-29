<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\dropWhile;

class DropWhileTest extends TestCase
{
    public function testDropWhileArr()
    {
        $array = Arr::from([1, 2, 3, 4, 5, 6])->dropWhile(function ($n) {
            return $n < 4;
        });

        $this->assertSame([4, 5, 6], $array->value());
    }

    public function testDropWhileFunc()
    {
        $array = [1, 2, 3, 4, 5, 6];

        $this->assertSame([4, 5, 6], dropWhile($array, function ($n) {
            return $n < 4;
        }));
    }

    public function testDropWhileDoesNotInfiniteLoopOrError()
    {
        $array = Arr::from([1, 2, 3, 4, 5, 6])->dropWhile(function ($v) {
            return true;
        });

        $this->assertSame([], $array->value());
    }
}
