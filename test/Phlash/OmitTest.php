<?php

namespace Phlash\Tests;

use Phlash\Obj;

class OmitTest extends TestCase
{
    public function testOmitObj()
    {
        $obj = Obj::stub()->assign(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5])->omit(['b', 'd']);

        $this->assertSame(
            ['a' => 1, 'c' => 3, 'e' => 5], $obj->toArray()
        );
    }
}
