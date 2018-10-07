<?php

namespace Phlash;

use Phlash\Arr;
use Phlash\Obj;
use Phlash\Str;

/**
 * Returns the appropriate collection for the passed $arg's type.
 *
 * @param  mixed $arg
 * @return mixed
 */
function phlash($arg)
{
    if (is_array($arg))
        return new Arr($arg);

    if (is_object($arg))
        return new Obj($arg);

    if (is_string($arg))
        return new Str($arg);

    return null;
}

/**
 * @see Phlash\Obj::assign
 */
function assign($obj, ...$args)
{
    return Obj::from($obj)->assign(...$args)->value();
}

/**
 * @see Phlash\Arr::chunk
 */
function chunk($arr, int $pieces = 1)
{
    return Arr::from($arr)->chunk($pieces)->value();
}

/**
 * @see Phlash\Arr::difference
 */
function difference($arr, ...$values)
{
    return Arr::from($arr)->difference(...$values)->value();
}

/**
 * @see Phlash\Arr::differenceBy
 */
function differenceBy($arr, ...$args)
{
    return Arr::from($arr)->differenceBy(...$args)->value();
}

/**
 * @alias differenceBy
 */
function difference_by($arr, ...$args)
{
    return differenceBy($arr, ...$args);
}

/**
 * @see Phlash\Arr::differenceWith
 */
function differenceWith($arr, ...$args)
{
    return Arr::from($arr)->differenceWith(...$args)->value();
}

/**
 * @alias differenceWith
 */
function difference_with($arr, ...$args)
{
    return differenceWith($arr, ...$args);
}

/**
 * @see Phlash\Arr::drop
 */
function drop($arr, int $n)
{
    return Arr::from($arr)->drop($n)->value();
}

/**
 * @see Phlash\Arr::dropRight
 */
function dropRight($arr, int $n)
{
    return Arr::from($arr)->dropRight($n)->value();
}

/**
 * @alias dropRight
 */
function drop_right($arr, int $n)
{
    return dropRight($arr, $n);
}

/**
 * @see Phlash\Arr::dropWhile
 */
function dropWhile($arr, callable $fn)
{
    return Arr::from($arr)->dropWhile($fn)->value();
}

/**
 * @alias dropWhile
 */
function drop_while($arr, callable $fn)
{
    return dropWhile($arr, $fn);
}

/**
 * @see Phlash\Arr::dropRightWhile
 */
function dropRightWhile($arr, callable $fn)
{
    return Arr::from($arr)->dropRightWhile($fn)->value();
}

/**
 * @alias dropRightWhile
 */
function drop_right_while($arr, callable $fn)
{
    return dropRightWhile($arr, $fn);
}

/**
 * @see Phlash\Arr::each
 */
function each($arr, callable $fn)
{
    return Arr::from($arr)->each($fn)->value();
}

/**
 * @see Phlash\Arr::fill
 */
function fill($arr, $value = null, $start = 0, $end = null)
{
    return Arr::from($arr)->fill($value, $start, $end)->value();
}

/**
 * @see Phlash\Arr::find
 */
function find($arr, callable $fn)
{
    return Arr::from($arr)->find($fn);
}

/**
 * @see Phlash\Arr::findOrFail
 */
function findOrFail($arr, callable $fn)
{
    return Arr::from($arr)->findOrFail($fn);
}

/**
 * @alias
 */
function find_or_fail($arr, callable $fn)
{
    return findOrFail($arr, $fn);
}

/**
 * @see Phlash\Arr::findOrDefault
 */
function findOrDefault($arr, callable $fn, $default = null)
{
    return Arr::from($arr)->findOrDefault($fn, $default);
}

/**
 * @alias findOrDefault
 */
function find_or_default($arr, callable $fn, $default = null)
{
    return findOrDefault($arr, $fn, $default);
}

/**
 * @see Phlash\Arr::findIndex
 */
function findIndex($arr, callable $fn)
{
    return Arr::from($arr)->findIndex($fn);
}

/**
 * @alias findIndex
 */
function find_index($arr, callable $fn)
{
    return findIndex($arr, $fn);
}

/**
 * @see Phlash\Arr::findLastIndex
 */
function findLastIndex($arr, callable $fn)
{
    return Arr::from($arr)->findLastIndex($fn);
}

/**
 * @see findLastIndex
 */
function find_last_index($arr, callable $fn)
{
    return findLastIndex($arr, $fn);
}

/**
 * @see Phlash\Arr::first
 */
function first($arr)
{
    return Arr::from($arr)->first();
}

/**
 * @see Phlash\Arr::flatten
 */
function flatten($arr)
{
    return Arr::from($arr)->flatten()->value();
}

/**
 * @see Phlash\Arr::flattenDeep
 */
function flattenDeep($arr)
{
    return Arr::from($arr)->flattenDeep()->value();
}

/**
 * @alias flattenDeep
 */
function flatten_deep($arr)
{
    return flattenDeep($arr);
}

/**
 * @alias first
 */
function head($arr)
{
    return first($arr);
}

/**
 * @see Phlash\Arr::index
 */
function index($arr, $value)
{
    return Arr::from($arr)->index($value);
}

/**
 * @see Phlash\Arr::initial
 */
function initial($arr)
{
    return Arr::from($arr)->initial();
}

/**
 * @see Phlash\Arr::last
 */
function last($arr)
{
    return Arr::from($arr)->last();
}

/**
 * @see Phlash\Arr::map
 */
function map($arr, $fn)
{
    return Arr::from($arr)->map($fn)->value();
}

/**
 * @see Phlash\Arr::filter
 */
function filter($arr, $fn)
{
    return Arr::from($arr)->filter($fn)->value();
}

/**
 * @see Phlash\Arr::join
 */
function join($arr, $delim)
{
    return Arr::from($arr)->join($delim);
}

/**
 * @see Phlash\Arr::implode
 */
function implode($arr, $delim)
{
    return join($arr, $delim);
}

/**
 * @see Phlash\Arr::tail
 */
function tail($arr)
{
    return Arr::from($arr)->tail();
}

/**
 * @see Phlash\Arr::reverse
 */
function reverse($arr)
{
    return Arr::from($arr)->reverse()->value();
}

/**
 * @see Phlash\Arr::at
 */
function at($arr, int $offset)
{
    return Arr::from($arr)->at($offset);
}

/**
 * @see Phlash\Arr::get
 */
function get($arr, int $offset)
{
    return at($arr, $offset);
}

/**
 * @see Phlash\Arr::set
 */
function set($arr, int $offset, $value)
{
    return Arr::from($arr, $offset, $value);
}

