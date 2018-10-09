<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::mergeSort
 */
function mergeSort($arr, callable $fn)
{
    return Arr::from($arr)->mergeSort($fn)->value();
}

/**
 * @alias mergeSort
 */
function merge_sort($arr, callable $fn)
{
    return mergeSort($arr, $fn);
}

