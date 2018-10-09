<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::concat
 */
function concat($arr, ...$args)
{
    return Arr::from($arr)->concat(...$args)->value();
}

