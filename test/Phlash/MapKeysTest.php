<?php

namespace Phlash\Tests;

use Phlash\Obj;

class MapKeysTest extends TestCase
{
    public function testMapKeysObj()
    {
        $obj = Obj::stub()->assign(['foo' => 1], ['bar' => 2])->mapKeys(function ($key, $value) {
            return $key . $value;
        });

        $this->assertEquals(1, $obj->foo1);
        $this->assertEquals(2, $obj->bar2);
    }

    //public function testMapKeysFunction()
    //{
    //}
}
