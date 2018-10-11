<?php

namespace Phlash;

use Phlash\Obj;

/**
 * @see Phlash\Obj::mapKeys
 */
function mapKeys($obj, callable $iteratee)
{
    return Obj::as($obj)->mapKeys($iteratee)->unwrap();
}

/**
 * @alias mapKeys
 */
function map_keys($obj, callable $iteratee)
{
    return mapKeys($obj, $iteratee);
}

