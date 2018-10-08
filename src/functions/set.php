<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::set
 */
function set($arr, int $offset, $value)
{
    return Arr::from($arr, $offset, $value);
}

