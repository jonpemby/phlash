<?php

namespace Phlash\Tests;

use Phlash\Func;

class FuncTest extends TestCase
{
    public function testBind()
    {
        $obj = new \stdClass();

        $this->assertObjectNotHasAttribute('foo', $obj);

        $fn = Func::bind($obj, function ($p, $v) {
            $this->{$p} = $v;
        });

        $fn('foo', 'bar');

        $this->assertObjectHasAttribute('foo', $obj);
        $this->assertEquals('bar', $obj->foo);
    }

    public function testNegate()
    {
        $pred = function () {
            return false;
        };

        $negated = Func::negate($pred);

        $this->assertTrue($negated());
    }

    public function testWrap()
    {
        $value = function ($text) {
            return htmlspecialchars($text);
        };

        $wrapped = Func::wrap($value, function ($func, $text) {
            return "<p>" . $func($text) . "</p>";
        });

        $this->assertSame('<p>Looks like Fred &amp; Ethel are here</p>', $wrapped('Looks like Fred & Ethel are here'));
    }
}

