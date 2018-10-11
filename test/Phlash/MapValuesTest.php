<?php

namespace Phlash\Tests;

use function Phlash\mapValues;
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

    public function testMapValuesFunction()
    {
        $obj = ['foo' => 1, 'bar' => 2];

        $stub = new \stdClass;

        $stub->foo = 'foo1';

        $stub->bar = 'bar2';

        $this->assertEquals(
            $stub,
            mapValues($obj, function ($key, $value) {
                return $key . $value;
            })
        );
    }
}

