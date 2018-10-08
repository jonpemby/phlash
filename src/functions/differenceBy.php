<?php

namespace Phlash\Arr;

use Arr;

/**
 * @see Phlash\Arr::differenceBy
 */
function differenceBy($arr, ...$args)
{
    return Arr::from($arr)->differenceBy(...$args)->value();
}

/**
 * @alias differenceBy
 */
function difference_by($arr, ...$args)
{
    return differenceBy($arr, ...$args);
}

