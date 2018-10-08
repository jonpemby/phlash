<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::difference
 */
function difference($arr, ...$values)
{
    return Arr::from($arr)->difference(...$values)->value();
}

