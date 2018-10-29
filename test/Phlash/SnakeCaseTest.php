<?php

namespace Phlash\Tests;

use Phlash\Str;

class SnakeCaseTest extends TestCase
{
    public function testSnakeCase()
    {
        $this->assertSame('foo_bar', Str::from('Foo Bar')->snakeCase()->value());
        $this->assertSame('foo_bar', Str::from('__foo__bar')->snakeCase()->value());
        $this->assertSame('foo_bar', Str::from('foo--bar')->snakeCase()->value());
        $this->assertSame('foo_bar', Str::from('foo_bar')->snakeCase()->value());
        $this->assertSame('foo_bar', Str::from('--foo--bar')->snakeCase()->value());
    }
}
