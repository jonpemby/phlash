<?php

namespace Phlash;

use Phlash\Func;

/**
 * @see Phlash\Func::apply
 */
function apply($thisArg, $fn, $args = [])
{
    return Func::apply($thisArg, $fn, $args);
}

