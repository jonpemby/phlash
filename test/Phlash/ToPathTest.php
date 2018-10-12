<?php

namespace Phlash\Tests;

use Phlash\Util;

class ToPathTest extends TestCase
{
    public function testToPath()
    {
        $this->assertEquals(['a', '0', 'bar'], Util::toPath('a[0].bar'));
        $this->assertEquals(['0', '1', '2'], Util::toPath('[0][1][2]'));
        $this->assertEquals(['foo', 'bar', 'fooBar'], Util::toPath('foo.bar.fooBar'));
    }
}

