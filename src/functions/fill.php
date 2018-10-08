<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::fill
 */
function fill($arr, $value = null, $start = 0, $end = null)
{
    return Arr::from($arr)->fill($value, $start, $end)->value();
}

