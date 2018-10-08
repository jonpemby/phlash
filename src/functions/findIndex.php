<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::findIndex
 */
function findIndex($arr, callable $fn)
{
    return Arr::from($arr)->findIndex($fn);
}

/**
 * @alias findIndex
 */
function find_index($arr, callable $fn)
{
    return findIndex($arr, $fn);
}

