<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\difference;

class DifferenceTest extends TestCase
{
    public function testDifferenceArr()
    {
        $array = new Arr([1, 2]);

        $other = [2, 3];

        $this->assertContains(1, $array->difference($other));
    }

    public function testDifferenceFunction()
    {
        $array = [1, 2];

        $other = [2, 3];

        $this->assertSame([1], difference($array, $other));
    }
}
