<?php

namespace Phlash;

use Phlash\Obj;

/**
 * @see Phlash\Obj::methods
 */
function methods($obj)
{
    return Obj::as($obj)->methods()->value();
}

