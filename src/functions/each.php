<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::each
 */
function each($arr, callable $fn)
{
    return Arr::from($arr)->each($fn)->value();
}

