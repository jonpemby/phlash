<?php

namespace Phlash\Tests;

use Phlash\Arr;

class IsAssociativeTest extends TestCase
{
    public function testIsAssociativeArr()
    {
        $this->assertTrue(Arr::isAssociative(['a' => 1]));
        $this->assertTrue(Arr::isAssociative([0, 1, 2, 'a' => 3, 'b' => 4, 5, 6]));

        $this->assertFalse(Arr::isAssociative([1, 2, 3, 4, 5, 6]));
        $this->assertFalse(Arr::isAssociative([]));
    }
}
