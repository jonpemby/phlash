<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::drop
 */
function drop($arr, int $n)
{
    return Arr::from($arr)->drop($n)->value();
}

