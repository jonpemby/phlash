<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::compact
 */
function compact($arr)
{
    return Arr::from($arr)->compact($arr)->value();
}

