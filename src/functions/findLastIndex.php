<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::findLastIndex
 */
function findLastIndex($arr, callable $fn)
{
    return Arr::from($arr)->findLastIndex($fn);
}

/**
 * @see findLastIndex
 */
function find_last_index($arr, callable $fn)
{
    return findLastIndex($arr, $fn);
}

