<?php

namespace Phlash\Tests;

use Phlash\Arr;

class IndexTest extends TestCase
{
    public function testIndex()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertEquals(2, $array->index(3));
    }
}
