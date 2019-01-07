<?php

namespace Phlash\Tests;

use Phlash\Obj;
use function Phlash\invert;

class InvertTest extends TestCase
{
    public function testInvertObj()
    {
        $obj = new Obj(['zamboni' => 'bambam', 'flintstone' => 'lion', 'sleeps' => 'lion']);

        $this->assertEquals(
            (object) ['bambam' => 'zamboni', 'lion' => 'sleeps'],
            $obj->invert()->value()
        );
    }

    public function testInvertFunction()
    {
        $obj = ['zamboni' => 'bambam', 'flintstone' => 'lion', 'sleeps' => 'lion'];

        $this->assertEquals(
            (object) ['bambam' => 'zamboni', 'lion' => 'sleeps'],
            invert($obj)
        );
    }
}

