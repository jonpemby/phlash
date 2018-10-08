<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::index
 */
function index($arr, $value)
{
    return Arr::from($arr)->index($value);
}

