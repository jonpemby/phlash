<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\findIndex;

class FindIndexTest extends TestCase
{
    public function testFindIndex()
    {
        $array = new Arr([1, 2, 3, 7, 4, 5, 6]);

        $this->assertEquals(3, $array->findIndex(function ($n) {
            return $n > 3;
        }));
    }

    public function testFindIndexFunc()
    {
        $array = [1, 2, 3, 7, 4, 5, 6];

        $this->assertEquals(3, findIndex($array, function ($n) {
            return $n > 3;
        }));
    }
}
