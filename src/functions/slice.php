<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::slice
 */
function slice ($arr, $start = 0, $end = null)
{
    return Arr::from($arr)->slice($start, $end)->value();
}

