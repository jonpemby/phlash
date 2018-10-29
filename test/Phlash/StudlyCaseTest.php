<?php

namespace Phlash\Tests;

use Phlash\Str;

class StudlyCaseTest extends TestCase
{
    public function testStudlyCase()
    {
        $this->assertSame('FooBar', Str::from('Foo Bar')->studlyCase()->value());
        $this->assertSame('FooBar', Str::from('__foo__bar')->studlyCase()->value());
        $this->assertSame('FooBar', Str::from('foo--bar')->studlyCase()->value());
        $this->assertSame('FooBar', Str::from('foo_bar')->studlyCase()->value());
        $this->assertSame('FooBar', Str::from('--foo--bar')->studlyCase()->value());
    }
}
