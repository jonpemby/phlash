<?php

namespace Phlash\Tests;

use Phlash\Str;

class StrTest extends TestCase
{
    public function testNew()
    {
        $this->assertInstanceOf(Str::class, new Str);
    }

    public function testStub()
    {
        $this->assertInstanceOf(Str::class, Str::from('new'));
    }

    public function testChars()
    {
        $chars = Str::from('hello world')->chars()->value();

        $this->assertSame(
            ['h', 'e', 'l', 'l', 'o', ' ', 'w', 'o', 'r', 'l', 'd'],
            $chars
        );
    }

    public function testCamelCase()
    {
        $this->assertSame('fooBar', Str::from('Foo Bar')->camelCase()->value());
        $this->assertSame('fooBar', Str::from('__foo__bar')->camelCase()->value());
        $this->assertSame('fooBar', Str::from('foo--bar')->camelCase()->value());
        $this->assertSame('fooBar', Str::from('foo_bar')->camelCase()->value());
        $this->assertSame('fooBar', Str::from('--foo--bar')->camelCase()->value());
    }
}
