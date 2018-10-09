<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::reduce
 */
function reduce($arr, ...$args)
{
    return Arr::from($arr)->reduce(...$args);
}

