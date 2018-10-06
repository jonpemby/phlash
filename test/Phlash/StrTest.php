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

    public function testKebabCase()
    {
        $this->assertSame('foo-bar', Str::from('Foo Bar')->kebabCase()->value());
        $this->assertSame('foo-bar', Str::from('__foo__bar')->kebabCase()->value());
        $this->assertSame('foo-bar', Str::from('foo--bar')->kebabCase()->value());
        $this->assertSame('foo-bar', Str::from('foo_bar')->kebabCase()->value());
        $this->assertSame('foo-bar', Str::from('--foo--bar')->kebabCase()->value());
    }

    public function testLowercase()
    {
        $this->assertSame('foo bar', Str::from('Foo Bar')->lowercase()->value());
    }

    public function testSnakeCase()
    {
        $this->assertSame('foo_bar', Str::from('Foo Bar')->snakeCase()->value());
        $this->assertSame('foo_bar', Str::from('__foo__bar')->snakeCase()->value());
        $this->assertSame('foo_bar', Str::from('foo--bar')->snakeCase()->value());
        $this->assertSame('foo_bar', Str::from('foo_bar')->snakeCase()->value());
        $this->assertSame('foo_bar', Str::from('--foo--bar')->snakeCase()->value());
    }

    public function testStartCase()
    {
        $this->assertSame('Foo Bar', Str::from('Foo Bar')->startCase()->value());
        $this->assertSame('Foo Bar', Str::from('__foo__bar')->startCase()->value());
        $this->assertSame('Foo Bar', Str::from('foo--bar')->startCase()->value());
        $this->assertSame('Foo Bar', Str::from('foo_bar')->startCase()->value());
        $this->assertSame('Foo Bar', Str::from('--foo--bar')->startCase()->value());
    }

    public function testStudlyCase()
    {
        $this->assertSame('FooBar', Str::from('Foo Bar')->studlyCase()->value());
        $this->assertSame('FooBar', Str::from('__foo__bar')->studlyCase()->value());
        $this->assertSame('FooBar', Str::from('foo--bar')->studlyCase()->value());
        $this->assertSame('FooBar', Str::from('foo_bar')->studlyCase()->value());
        $this->assertSame('FooBar', Str::from('--foo--bar')->studlyCase()->value());
    }

    public function testWords()
    {
        $words = Str::from('hello world')->words();

        $this->assertSame(['hello', 'world'], $words->value());
    }
}
