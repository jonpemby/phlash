<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::chunk
 */
function chunk($arr, int $pieces = 1)
{
    return Arr::from($arr)->chunk($pieces)->value();
}

