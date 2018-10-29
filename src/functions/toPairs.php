<?php

namespace Phlash;

use Phlash\Obj;

/**
 * Convert an object into an array of key + value pairs.
 *
 * @see Phlash\Obj::toPairs
 * @return array
 */
function toPairs($obj)
{
    return Obj::as($obj)->toPairs()->value();
}

/**
 * @alias toPairs
 */
function to_pairs($obj)
{
    return toPairs($obj);
}

