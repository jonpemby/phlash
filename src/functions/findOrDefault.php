<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::findOrDefault
 */
function findOrDefault($arr, callable $fn, $default = null)
{
    return Arr::from($arr)->findOrDefault($fn, $default);
}

/**
 * @alias findOrDefault
 */
function find_or_default($arr, callable $fn, $default = null)
{
    return findOrDefault($arr, $fn, $default);
}

