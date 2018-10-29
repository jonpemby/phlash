<?php

namespace Phlash\Tests;

use Phlash\Obj;

class ObjTest extends TestCase
{
    public function testStub()
    {
        $this->assertEquals(new Obj, Obj::stub());
    } 
}
