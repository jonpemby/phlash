<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::first
 */
function first($arr)
{
    return Arr::from($arr)->first();
}

/**
 * @alias first
 */
function head($arr)
{
    return first($arr);
}

