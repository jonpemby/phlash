<?php

namespace Phlash;

use Phlash\Func;

/**
 * Passes the `$object` to `$function` and returns `$object`. If no `$function` is provided,
 * proxies any method calls to the provided `$object` and returns the provided `$object`.
 *
 * @param  mixed  $object
 * @param  callable|null  $function
 * @return object passed as $object
 */
function tap($object, $function = null)
{
    if (is_null($function))
        return Func::proxy($object);

    $function($object);

    return $object;
}

