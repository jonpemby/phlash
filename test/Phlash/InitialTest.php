<?php

namespace Phlash\Tests;

use Phlash\Arr;

class InitialTest extends TestCase
{
    public function testInitial()
    {
        $array = new Arr([1, 2, 3, 4, 5, 6]);

        $this->assertSame([1, 2, 3, 4, 5], $array->initial()->value());
    }
}
