<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::dropRight
 */
function dropRight($arr, int $n)
{
    return Arr::from($arr)->dropRight($n)->value();
}

/**
 * @alias dropRight
 */
function drop_right($arr, int $n)
{
    return dropRight($arr, $n);
}

