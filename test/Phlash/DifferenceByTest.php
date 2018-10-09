<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\differenceBy;

class DifferenceByTest extends TestCase
{
    public function testDifferenceByArr()
    {
        $array = new Arr([1.2, 2.2]);

        $other = [2.5, 3.1];

        $this->assertContains(1.2, $array->differenceBy($other, function ($value) {
            return floor($value);
        }));
    }

    public function testDifferenceByFunction()
    {
        $array = [1.2, 2.2];

        $other = [2.5, 3.1];

        $this->assertSame([1.2], differenceBy($array, $other, function ($value) {
            return floor($value);
        }));
    }
}

