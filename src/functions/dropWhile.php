<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::dropWhile
 */
function dropWhile($arr, callable $fn)
{
    return Arr::from($arr)->dropWhile($fn)->value();
}

/**
 * @alias dropWhile
 */
function drop_while($arr, callable $fn)
{
    return dropWhile($arr, $fn);
}

