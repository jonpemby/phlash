<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::flatten
 */
function flatten($arr)
{
    return Arr::from($arr)->flatten()->value();
}

