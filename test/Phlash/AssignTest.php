<?php

namespace Phlash\Tests;

use Phlash\Obj;

class AssignTest extends TestCase
{
    public function testAssign()
    {
        $obj = new Obj(['first' => 10, 'third' => 20]);

        $other = new Obj(['first' => 1, 'second' => 4]);

        $another = $obj->assign($other);

        $this->assertEquals(1, $another->first);
        $this->assertEquals(4, $another->second);
        $this->assertEquals(20, $another->third);
    }
}
