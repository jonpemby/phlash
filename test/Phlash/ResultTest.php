<?php

namespace Phlash\Tests;

use function Phlash\result;
use Phlash\Obj;
use Phlash\Tests\Support\Bindable;

class ResultTest extends TestCase
{
    public function testResultObj()
    {
        $bindable = new Bindable(5);

        $obj = new Obj($bindable);

        $this->assertEquals(5, $obj->result('value'));
    }

    public function testResultFunction()
    {
        $bindable = new Bindable(5);

        $this->assertEquals(5, result($bindable, 'value'));
    }
}

