<?php

namespace Phlash\Tests;

use Phlash\Arr;
use function Phlash\compact;

class CompactTest extends TestCase
{
    public function testCompactArr()
    {
        $array = new Arr([0, 1, acos(1.1), false, null, 2, 5, '']);

        $this->assertSame([1, 2, 5], $array->compact()->value());
    }

    public function testCompactFunction()
    {
        $array = [0, 1, acos(1.1), false, null, 2, 5, ''];

        $this->assertSame([1, 2, 5], compact($array));
    }
}
