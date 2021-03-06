<?php

namespace Phlash;

use Phlash\Arr;
use Phlash\Obj;
use Phlash\Str;
use Phlash\Num;

/**
 * Returns the appropriate collection for the passed $arg's type.
 *
 * @param  mixed $arg
 * @return mixed
 */
function phlash($arg = null)
{
    if (is_array($arg))
        return Arr::isAssociative($arg) ? new Obj($arg)
                                        : new Arr($arg);

    if (is_object($arg))
        return new Obj($arg);

    if (is_string($arg))
        return new Str($arg);

    if (is_int($arg) || is_float($arg))
        return new Num($arg);

    return null;
}

