<?php

namespace Phlash;

use function Phlash\phlash;

/**
 * @see Phlash\AbstractCollection::keyBy
 */
function keyBy($collection, callable $fn)
{
    return phlash($collection)->keyBy($fn)->toArray();
}

