<?php

namespace Phlash\Tests;

use Phlash\Str;

class CamelCaseTest extends TestCase
{
    public function testCamelCase()
    {
        $this->assertSame('fooBar', Str::from('Foo Bar')->camelCase()->value());
        $this->assertSame('fooBar', Str::from('__foo__bar')->camelCase()->value());
        $this->assertSame('fooBar', Str::from('foo--bar')->camelCase()->value());
        $this->assertSame('fooBar', Str::from('foo_bar')->camelCase()->value());
        $this->assertSame('fooBar', Str::from('--foo--bar')->camelCase()->value());
    }
}
