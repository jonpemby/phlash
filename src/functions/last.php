<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::last
 */
function last($arr)
{
    return Arr::from($arr)->last();
}

/**
 * @see Phlash\Arr::tail
 */
function tail($arr)
{
    return Arr::from($arr)->tail();
}

