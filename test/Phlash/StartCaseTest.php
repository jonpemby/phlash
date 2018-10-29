<?php

namespace Phlash\Tests;

use Phlash\Str;

class StartCaseTest extends TestCase
{
    public function testStartCase()
    {
        $this->assertSame('Foo Bar', Str::from('Foo Bar')->startCase()->value());
        $this->assertSame('Foo Bar', Str::from('__foo__bar')->startCase()->value());
        $this->assertSame('Foo Bar', Str::from('foo--bar')->startCase()->value());
        $this->assertSame('Foo Bar', Str::from('foo_bar')->startCase()->value());
        $this->assertSame('Foo Bar', Str::from('--foo--bar')->startCase()->value());
    }
}
