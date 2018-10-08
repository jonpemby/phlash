<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::find
 */
function find($arr, callable $fn)
{
    return Arr::from($arr)->find($fn);
}

