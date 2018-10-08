<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::reverse
 */
function reverse($arr)
{
    return Arr::from($arr)->reverse()->value();
}

