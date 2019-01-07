<?php

namespace Phlash;

use Phlash\Obj;

/**
 * Create an inverted object with the values becoming the keys and the
 * keys becoming the values. Subsequent values replace former keys.
 *
 * @param \stdClass  $obj
 * @return \stdClass
 */
function invert($obj)
{
    return Obj::as($obj)->invert()->value();
}

