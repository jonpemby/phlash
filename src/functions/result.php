<?php

namespace Phlash;

use Phlash\Obj;

/**
 * @see Phlash\Obj::result
 */
function result($obj, $prop)
{
    return Obj::as($obj)->result($prop);
}

