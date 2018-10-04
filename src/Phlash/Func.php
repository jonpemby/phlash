<?php

namespace Phlash;

use Closure;

abstract class Func {
    /**
     * Creates a function that invokes the given $fn bound to the $thisArg.
     *
     * @param  mixed  $thisArg
     * @param  callable  $fn
     * @return callable
     */
    public static function bind($thisArg, $fn)
    {
        return Closure::bind($fn, $thisArg);
    }

    /**
     * Creates a function that returns the negation of its given predicate.
     *
     * @param  callable $fn
     * @return callable
     */
    public static function negate(callable $fn)
    {
        return function (...$args) use ($fn) {
            return ! $fn(...$args);
        };
    }

    /**
     * Creates a new function that provides the provided value as its first argument.
     *
     * @param  mixed  $value
     * @param  callable $fn
     * @return callable
     */
    public static function wrap($value, callable $fn)
    {
        return function (...$args) use ($value, $fn) {
            return $fn($value, ...$args);
        };
    }
}
