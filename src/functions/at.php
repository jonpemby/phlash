<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::at
 */
function at($arr, int $offset)
{
    return Arr::from($arr)->at($offset);
}

/**
 * @see Phlash\Arr::get
 */
function get($arr, int $offset)
{
    return at($arr, $offset);
}

