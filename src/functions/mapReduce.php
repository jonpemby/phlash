<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::mapReduce
 */
function mapReduce($arr, $prop = '', $fn)
{
    return Arr::from($arr)->mapReduce($prop, $fn);
}

/**
 * @alias mapReduce
 */
function map_reduce($arr, $prop = '', $fn)
{
    return mapReduce($arr, $prop, $fn);
}

