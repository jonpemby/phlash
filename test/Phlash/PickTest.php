<?php

namespace Phlash\Tests;

use Phlash\Obj;

class PickTest extends TestCase
{
    public function testPickObj()
    {
        $obj = Obj::stub()
            ->assign(['foo' => 1], ['bar' => 2], ['exclude' => 3], ['nope' => 4])
            ->pick(['foo', 'bar']);

        $this->assertEquals(1, $obj->foo);
        $this->assertEquals(2, $obj->bar);
        $this->assertObjectNotHasAttribute('exclude', $obj);
        $this->assertObjectNotHasAttribute('nope', $obj);
    }
}
