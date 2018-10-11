<?php

namespace Phlash\Tests;

use function Phlash\wrap;
use Phlash\Func;

class WrapTest extends TestCase
{
    public function testWrapFunc()
    {
        $value = function ($text) {
            return htmlspecialchars($text);
        };

        $wrapped = Func::wrap($value, function ($func, $text) {
            return "<p>" . $func($text) . "</p>";
        });

        $this->assertSame(
            '<p>Looks like Fred &amp; Ethel are here</p>',
            $wrapped('Looks like Fred & Ethel are here')
        );
    }

    public function testWrapFunction()
    {
        $value = function ($text) {
            return htmlspecialchars($text);
        };

        $wrapped = wrap($value, function ($func, $text) {
            return "<p>" . $func($text) . "</p>";
        });

        $this->assertSame(
            '<p>Looks like Fred &amp; Ethel are here</p>',
            $wrapped('Looks like Fred & Ethel are here')
        );
    }
}

