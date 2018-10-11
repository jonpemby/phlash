<?php

namespace Phlash;

use Phlash\Obj;

/**
 * @see Phlash\Obj::mapValues
 */
function mapValues($obj, callable $iteratee)
{
    return Obj::as($obj)->mapValues($iteratee)->unwrap();
}

/**
 * @alias mapValues
 */
function map_values($obj, callable $iteratee)
{
    return mapValues($obj, $iteratee);
}

