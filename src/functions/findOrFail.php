<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::findOrFail
 */
function findOrFail($arr, callable $fn)
{
    return Arr::from($arr)->findOrFail($fn);
}

/**
 * @alias findOrFail
 */
function find_or_fail($arr, callable $fn)
{
    return findOrFail($arr, $fn);
}

