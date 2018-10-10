<?php

namespace Phlash\Tests;

use Phlash\Obj;

class MapValuesTest extends TestCase
{
    public function testMapValuesObj()
    {
        $obj = Obj::stub()->assign(['foo' => 1], ['bar' => 2])->mapValues(function ($key, $value) {
            return $key . $value;
        });

        $this->assertEquals('foo1', $obj->foo);
        $this->assertEquals('bar2', $obj->bar);
    }

    //public function testMapValuesFunction()
    //{
    //}
}
