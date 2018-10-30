<?php

namespace Phlash\Tests;

use function Phlash\keyBy;
use Phlash\Arr;

class KeyByTest extends TestCase
{
    public function testKeyBy()
    {
        $array = [
            ['foo' => 2, 'bar' => 123],
            ['foo' => 1, 'bar' => 756],
            ['foo' => 3, 'bar' => 345],
        ];

        $keyed = Arr::from($array)->keyBy(function ($value) {
            return $value['foo'];
        });

        $expected = [
            2 => ['foo' => 2, 'bar' => 123],
            1 => ['foo' => 1, 'bar' => 756],
            3 => ['foo' => 3, 'bar' => 345],
        ];

        $this->assertSame($expected, $keyed->toArray());
    }

    public function testFooFunction()
    {
        $array = [
            ['foo' => 2, 'bar' => 123],
            ['foo' => 1, 'bar' => 756],
            ['foo' => 3, 'bar' => 345],
        ];

        $keyed = keyBy($array, function ($value) {
            return $value['foo'];
        });

        $expected = [
            2 => ['foo' => 2, 'bar' => 123],
            1 => ['foo' => 1, 'bar' => 756],
            3 => ['foo' => 3, 'bar' => 345],
        ];

        $this->assertSame($expected, $keyed);
    }
}
