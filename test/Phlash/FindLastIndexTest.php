<?php

namespace Phlash\Tests;

use Phlash\Arr;

class FindLastIndexTest extends TestCase
{
    public function testFindLastIndex()
    {
        $array = new Arr([1, 2, 3, 7, 4, 5, 7, 6]);

        $found = $array->findLastIndex(function ($v) {
            return $v === 7;
        });

        $this->assertEquals(6, $found);
    }
}
