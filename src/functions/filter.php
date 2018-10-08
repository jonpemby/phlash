<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::filter
 */
function filter($arr, $fn)
{
    return Arr::from($arr)->filter($fn)->value();
}

