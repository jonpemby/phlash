<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::join
 */
function join($arr, $delim)
{
    return Arr::from($arr)->join($delim);
}

/**
 * @see Phlash\Arr::implode
 */
function implode($arr, $delim)
{
    return join($arr, $delim);
}

