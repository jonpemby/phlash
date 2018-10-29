<?php

namespace Phlash\Tests;

use Phlash\Arr;

class FindOrDefaultTest extends TestCase
{
    public function testFindOrDefault()
    {
        $array = new Arr(['foo' => 1], ['foo' => 2], ['bar' => 3]);

        $found = $array->findOrDefault(['bar' => 1], function ($v) {
            if (isset($v['bar']) && $v['bar'] < 3)
                return true;

            return false;
        });

        $this->assertSame(['bar' => 1], $found);
    }
}
