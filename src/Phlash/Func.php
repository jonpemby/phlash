<?php

namespace Phlash;

use Closure;

abstract class Func extends AbstractPhlashClass
{
    /**
     * Create a new function that invokes the provided `$fn` with up to 1 argument.
     *
     * @return Closure
     */
    public static function unary($fn)
    {
        return static::ary($fn, 1);
    }

    /**
     * Create a new function that invokes the provided `$fn` with up to `$n` arguments.
     *
     * @return Closure
     */
    public static function ary($fn, $n)
    {
        return function (...$args) use ($fn, $n)
        {
            $newArgs = Arr::from($args)->slice(0, $n)->value();

            return $fn(...$newArgs);
        };
    }

    /**
     * Calls the supplied function bound to the given $thisArg with the array of arguments.
     *
     * @return  Result of the applied function
     */
    public static function apply($thisArg, $fn, $args = [])
    {
        return static::bind($thisArg, $fn)(...$args);
    }

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
     * Calls the supplied function bound to the given $thisArg with the comma-separated arguments.
     *
     * @return  Result of the called function
     */
    public static function call($thisArg, $fn, ...$args)
    {
        return static::bind($thisArg, $fn)(...$args);
    }

    /**
     * Creates a new function that flips tthe order of the provided `$fn`'s arguments.
     *
     * @param  callable $fn
     * @return Closure
     */
    public static function flip($fn)
    {
        return function (...$args) use ($fn)
        {
            $flippedArgs = Arr::from($args)->reverse()->value();

            return $fn(...$flippedArgs);
        };
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

    /**
     * Proxy method calls to the $obj specified by the argument.
     * Return the provided `$obj` after calling any method.
     *
     * @return FuncProxy
     */
    public static function proxy($obj)
    {
        return new FuncProxy($obj);
    }
}

