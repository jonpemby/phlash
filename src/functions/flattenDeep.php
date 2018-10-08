<?php

namespace Phlash;

use Phlash\Arr;

/**
 * @see Phlash\Arr::flattenDeep
 */
function flattenDeep($arr)
{
    return Arr::from($arr)->flattenDeep()->value();
}

/**
 * @alias flattenDeep
 */
function flatten_deep($arr)
{
    return flattenDeep($arr);
}

