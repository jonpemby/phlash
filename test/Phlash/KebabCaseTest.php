<?php

namespace Phlash\Tests;

use Phlash\Str;

class KebabCaseTest extends TestCase
{
    public function testKebabCase()
    {
        $this->assertSame('foo-bar', Str::from('Foo Bar')->kebabCase()->value());
        $this->assertSame('foo-bar', Str::from('__foo__bar')->kebabCase()->value());
        $this->assertSame('foo-bar', Str::from('foo--bar')->kebabCase()->value());
        $this->assertSame('foo-bar', Str::from('foo_bar')->kebabCase()->value());
        $this->assertSame('foo-bar', Str::from('--foo--bar')->kebabCase()->value());
    }
}
