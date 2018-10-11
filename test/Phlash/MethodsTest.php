<?php

namespace Phlash\Tests;

use function Phlash\methods;
use Phlash\Obj;
use Phlash\Tests\Support\Bindable;

class MethodsTest extends TestCase
{
    public function testMethodsObj()
    {
        $obj = Obj::as(new Bindable(5));

        $methods = $obj->methods();

        $this->assertSame(
            ['__construct', 'value'], $methods->value()
        );


        $obj = Obj::as(['foo' => 5]);

        $methods = $obj->methods();

        $this->assertEmpty($methods);
    }

    public function testMethodsFunction()
    {
        $obj = new Bindable(0);

        $methods = methods($obj);

        $this->assertSame(
            ['__construct', 'value'], $methods
        );


        $obj = ['foo' => 5];

        $methods = methods($obj);

        $this->assertEmpty($methods);
    }
}

