<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::unique
 */
function unique($arr)
{
    return Arr::from($arr)->unique()->value();
}

