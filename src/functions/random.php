<?php

namespace Phlash;

use Phlash\Num;

/**
 * @see Phlash\Num::random
 */
function random($lower = 0, $higher = 1, $floating = false)
{
    return Num::random($lower, $higher, $floating)->value();
}

