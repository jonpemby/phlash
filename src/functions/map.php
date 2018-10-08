<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::map
 */
function map($arr, $fn)
{
    return Arr::from($arr)->map($fn)->value();
}

