<?php

namespace Phlash\Tests;

use Phlash\Arr;
use Phlash\Obj;
use Phlash\Str;
use Phlash\Num;
use function Phlash\phlash;

class PhlashTest extends TestCase
{
    public function testPhlash()
    {
        $this->assertInstanceOf(Arr::class, phlash([1, 2, 3, 4, 5]));
        $this->assertInstanceOf(Obj::class, phlash(['foo' => 'bar']));
        $this->assertInstanceOf(Obj::class, phlash(new \stdClass));
        $this->assertInstanceOf(Str::class, phlash('hello world'));
        $this->assertInstanceOf(Num::class, phlash(6));
    }

    public function testDynamicMethodCalls()
    {
        $collection = phlash([1, 2, 3, 4, 5, 6]);

        $this->assertSame(
            [1, 2, 3],
            $collection->dropRight(3)->value()
        );

        $this->assertSame(
            [1, 2, 3],
            $collection->drop_right(3)->value()
        );

        $this->assertSame(
            [1, 2, 3],
            $collection->DropRight(3)->value()
        );
    }
}
