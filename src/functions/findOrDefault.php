<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::findOrDefault
 */
function findOrDefault($arr, ...$args)
{
    return Arr::from($arr)->findOrDefault(...$args);
}

/**
 * @alias findOrDefault
 */
function find_or_default($arr, ...$args)
{
    return findOrDefault($arr, ...$args);
}

