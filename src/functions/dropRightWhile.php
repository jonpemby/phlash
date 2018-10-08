<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::dropRightWhile
 */
function dropRightWhile($arr, callable $fn)
{
    return Arr::from($arr)->dropRightWhile($fn)->value();
}

/**
 * @alias dropRightWhile
 */
function drop_right_while($arr, callable $fn)
{
    return dropRightWhile($arr, $fn);
}

