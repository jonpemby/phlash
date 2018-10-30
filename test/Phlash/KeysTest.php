<?php

namespace Phlash\Tests;

use function Phlash\phlash;
use function Phlash\keys;

class KeysTest extends TestCase
{
    public function testKeys()
    {
        $this->assertSame(
            ['foo', 'bar', 'baz'],
            phlash(['foo' => 1, 'bar' => 2, 'baz' => 3])->keys()->value()
        );
    }

    public function testKeysFunction()
    {
        $this->assertSame(
            ['foo', 'bar', 'baz'],
            keys(['foo' => 1, 'bar' => 2, 'baz' => 3])
        );
    }
}
