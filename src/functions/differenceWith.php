<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::differenceWith
 */
function differenceWith($arr, ...$args)
{
    return Arr::from($arr)->differenceWith(...$args)->value();
}

/**
 * @alias differenceWith
 */
function difference_with($arr, ...$args)
{
    return differenceWith($arr, ...$args);
}

