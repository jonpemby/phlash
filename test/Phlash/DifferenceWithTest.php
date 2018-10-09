<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\differenceWith;

class DifferenceWithTest extends TestCase
{
    public function testDifferenceWithArr()
    {
        $array = new Arr([['a' => 1, 'b' => 2], ['a' => 2, 'b' => 1]]);

        $other = [['a' => 1, 'b' => 2]];

        $this->assertContains(['a' => 2, 'b' => 1], $array->differenceWith($other, function ($value, $otherValue) {
            return $value['a'] === $otherValue['a'] && $value['b'] === $otherValue['b'];
        }));
    }

    public function testDifferenceWithFunction()
    {
        $array = [['a' => 1, 'b' => 2], ['a' => 2, 'b' => 1]];

        $other = [['a' => 1, 'b' => 2]];

        $this->assertSame([['a' => 2, 'b' => 1]], differenceWith($array, $other, function ($value, $otherValue) {
            return $value['a'] === $otherValue['a'] && $value['b'] === $otherValue['b'];
        }));
    }
}
