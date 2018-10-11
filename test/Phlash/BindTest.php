<?php

namespace Phlash\Tests;

use function Phlash\bind;
use Phlash\Func;

class BindTest extends TestCase
{
    public function testBindFunc()
    {
        $obj = new \stdClass();

        $this->assertObjectNotHasAttribute('foo', $obj);

        $fn = Func::bind($obj, function ($p, $v) {
            $this->{$p} = $v;
        });

        $fn('foo', 'bar');

        $this->assertObjectHasAttribute('foo', $obj);
        $this->assertEquals('bar', $obj->foo);
    }

    public function testBindFunction()
    {
        $obj = new \stdClass;

        $this->assertObjectNotHasAttribute('foo', $obj);

        $fn = bind($obj, function ($p, $v) {
            $this->{$p} = $v;
        });

        $fn('foo', 'bar');

        $this->assertObjectHasAttribute('foo', $obj);
        $this->assertEquals('bar', $obj->foo);
    }
}

