<?php

namespace Phlash;

use Phlash\Obj;

/**
 * @see Phlash\Obj::assign
 */
function assign($obj, ...$args)
{
    return Obj::from($obj)->assign(...$args)->value();
}

