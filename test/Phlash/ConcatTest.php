<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\concat;

class ConcatTest extends TestCase
{
    public function testConcatArr()
    {
        $array = new Arr([1, 2, 3]);

        $this->assertSame(
            [1, 2, 3, 4, 5, 6, 7, 8, 9],
            $array->concat([4, 5, 6], 7, 8, 9)->value()
        );
    }

    public function testConcatFunction()
    {
        $this->assertSame([1, 2, 3, 4, 5, 6], concat([1, 2, 3], [4, 5], 6));
    }
}
