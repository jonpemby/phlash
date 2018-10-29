<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\find;

class FindTest extends TestCase
{
    public function testFind()
    {
        $array = new Arr([1, 2, 3, 7, 4, 5, 6]);

        $this->assertEquals(7, $array->find(function ($n) {
            return $n > 3;
        }));
    }

    public function testFindFunc()
    {
        $array = [1, 2, 3, 7, 4, 5, 6];

        $this->assertEquals(7, find($array, function ($n) {
            return $n > 3;
        }));
    }
}
