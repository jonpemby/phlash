<?php

namespace Phlash\Tests;

use Phlash\Arr;

class FindOrFailTest extends TestCase
{
    /**
     * @expectedException  Phlash\NotFoundException
     */
    public function testFindOrFail()
    {
        $array = new Arr([1, 2, 3, 4, 5]);

        $array->findOrFail(function ($v) {
            return $v > 5;
        });
    }
}
