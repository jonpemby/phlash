<?php

namespace Phlash;

use Phlash\Support\AbstractCollection;
use function implode;

class Arr extends AbstractCollection
{
    /**
     * @var array  Internal representation of an array
     */
    protected $value;

    /**
     * @constructor
     * @param array  $value
     */
    public function __construct(array $value = [])
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function __get($prop)
    {
        if (is_string($prop)) {
            return $this->map(function ($element) use ($prop) {
                return is_array($element) ? $element[$prop] : $element->{$prop};
            });
        }

        return $this->value[$prop];
    }

    /**
     * Remove all falsey values from the Arr
     *
     * @return Arr
     */
    public function compact()
    {
        $arr = [];

        foreach ($this->value as $value) {
            if (empty($value) || is_nan($value))
                continue;

            $arr[] = $value;
        }

        return new Arr($arr);
    }

    /**
     * Concatenate this array with additional values and/or arrays
     *
     * @param  mixed ...$args  Values or additional arrays to add to this Arr
     * @return Arr
     */
    public function concat(...$args)
    {
        $arr = $this->value;

        foreach ($args as $arg) {
            if (is_array($arg)) {
                foreach ($arg as $value) {
                    $arr[] = $value;
                }
            } else {
                $arr[] = $arg;
            }
        }

        return new Arr($arr);
    }

    /**
     * Chunks the Arr into subarrays containing a given number of elements
     *
     * @param  int $pieces  Number of pieces to chunk
     * @return Arr
     */
    public function chunk(int $pieces = 1)
    {
        $n = [];

        for ($i = 0; $i < count($this->value); $i += $pieces) {
            $m = [];

            for ($j = 0; $j < $pieces && $i + $j < count($this->value); $j += 1)
                $m[] = $this->value[$i + $j];

            $n[] = $m;
        }

        return new Arr($n);
    }

    /**
     * Exclude the elements of this Arr that exist in the given arrays
     *
     * @param  array[] ...$pieces  Arrays to check for elements to exclude
     * @return Arr
     */
    public function difference(...$values)
    {
        $diff = [];

        foreach ($this->value as $v) {
            foreach ($values as $value) {
                if (! in_array($v, $value)) $diff[] = $v;
            }
        }

        return new Arr($diff);
    }

    /**
     * Exclude the elements of this Arr that exist in the given arrays as mapped by the $iteratee
     *
     * @param  array[] ...$args  Arrays to check for elements to exclude
     * @return Arr
     */
    public function differenceBy(...$args)
    {
        $fn = array_pop($args);

        $diff = [];

        foreach ($this->value as $v) {
            foreach ($args as $value) {
                if (! in_array($fn($v), array_map($fn, $value))) $diff[] = $v;
            }
        }

        return new Arr($diff);
    }

    /**
     * Exclude the elements of this Arr that exist in the given arrays as compared by the $comparator
     *
     * @param  array[] ...$args  Arrays to check for elements to exclude
     * @return Arr
     */
    public function differenceWith(...$args)
    {
        $fn = array_pop($args);

        $diff = [];

        foreach ($this->value as $v) {
            foreach ($args as $value) {
                foreach ($value as $el) if (! $fn($v, $el)) $diff[] = $v;
            }
        }

        return new Arr($diff);
    }

    /**
     * Returns a new Arr w/ $n elements dropped from the beginning
     *
     * @param  int $n  Number of elements to drop
     */
    public function drop(int $n)
    {
        return new Arr(array_slice($this->value, -1 * $n));
    }

    /**
     * Returns a new Arr w/ $n elements dropped from the end
     *
     * @param  int $n  Number of elements to drop
     */
    public function dropRight(int $n)
    {
        return new Arr(array_slice($this->value, 0, $this->count() - $n));
    }

    /**
     * @return Arr
     */
    public function dropWhile(callable $fn)
    {
        $arr = $this->value;

        while (true) {
            if (! isset($arr[0])) break;

            if ($fn($arr[0])) {
                array_shift($arr);
            } else {
                break;
            }
        }

        return new Arr($arr);
    }

    /**
     * @return Arr
     */
    public function dropRightWhile(callable $fn)
    {
        $arr = $this->value;

        while (true) {
            if (! isset($arr[0])) break;

            if ($fn($arr[count($arr) - 1])) {
                array_pop($arr);
            } else {
                break;
            }
        }

        return new Arr($arr);
    }

    /**
     * Call a function on each element of the Arr without mutating it.
     *
     * @return Arr
     */
    public function each(callable $fn)
    {
        foreach ($this->value as $index => $element)
            $fn($element, $index);

        return new Arr($this->value);
    }

    /**
     * Fill the collection with the value from the $start parameter to the $end.
     *
     * @param  mixed $value  Value with which to fill
     * @param  int $start  Start index
     * @param  int $end  End index
     * @return Arr
     */
    public function fill($value = null, $start = 0, $end = null)
    {
        $arr = $this->value;

        $end = $end ?: count($arr);

        for ($i = $start; $i < $end; $i += 1)
            $arr[$i] = $value;

        return new Arr($arr);
    }

    /**
     * Find the first value in the index matched by the $fn
     *
     * @param  callable $fn  Predicate by which to match
     * @return mixed
     */
    public function find(callable $fn)
    {
        foreach ($this->value as $v) {
            if ($fn($v)) return $v;
        }

        return null;
    }

    /**
     * Finds the first value matched by the predicate or throws an exception
     *
     * @param  callable $fn
     * @return mixed
     *
     * @throws Phlash\NotFoundException
     */
    public function findOrFail(callable $fn)
    {
        $found = $this->find($fn);

        if (is_null($found))
            throw new NotFoundException;

        return $found;
    }

    /**
     * Finds the first value matched by the predicate or returns a provided default value
     *
     * @param  callable  $fn
     * @param  mixed  $default
     * @return mixed
     */
    public function findOrDefault(...$args)
    {
        $fn = array_pop($args);

        $default = $args[0] ?? null;

        $found = $this->find($fn);

        if (is_null($found))
            return $default;

        return $found;
    }

    /**
     * Find the index of the value matched by the $fn.
     *
     * @param  callable  $fn  Predicate by which to match
     * @return int
     */
    public function findIndex(callable $fn)
    {
        foreach ($this->value as $i => $v) {
            if ($fn($v)) return $i;
        }

        return -1;
    }

    /**
     * Find the last index of the value matched by the $fn.
     *
     * @param  callable $fn
     * @return int
     */
    public function findLastIndex(callable $fn)
    {
        for ($i = count($this->value) - 1; $i > -1; $i -= 1) {
            if ($fn($this->value[$i])) return $i;
        }

        return -1;
    }

    /**
     * Retrieve the first value from the Arr.
     *
     * @return mixed
     */
    public function first()
    {
        return $this->value[0] ?: null;
    }

    /**
     * Flatten the Arr by one level.
     *
     * @return Arr
     */
    public function flatten()
    {
        $arr = [];

        foreach ($this->value as $element)
            if (is_array($element)) foreach ($element as $sub)
                $arr[] = $sub;
            else
                $arr[] = $element;

        return new Arr($arr);
    }

    /**
     * Recursively flatten the array.
     *
     * @return Arr
     */
    public function flattenDeep()
    {
        $arr = [];

        foreach ($this->value as $element) {
            if (is_array($element)) {
                $sub = Arr::from($element)->flattenDeep();

                foreach ($sub as $sub_element) {
                    $arr[] = $sub_element;
                }
            } else {
                $arr[] = $element;
            }
        }

        return new Arr($arr);
    }

    /**
     * Create a new Arr from a given initial value.
     *
     * @param  array  $value  Initial value of the Arr
     * @return Arr
     */
    public static function from(array $value = [])
    {
        return new static($value);
    }

    /**
     * @alias first
     */
    public function head()
    {
        return $this->first();
    }

    /**
     * Find the first index where the value matches the provided $value.
     *
     * @param  mixed $value
     * @return int
     */
    public function index($value)
    {
        $arr = $this->value;

        for ($i = 0; $i < count($arr); $i += 1)
            if ($arr[$i] === $value) return $i;

        return -1;
    }

    /**
     * Get all but the last element of the Arr.
     *
     * @return Arr
     */
    public function initial()
    {
        $arr = $this->value;

        array_pop($arr);

        return new Arr($arr);
    }

    /**
     * Get the last element of the Arr.
     *
     * @return mixed
     */
    public function last()
    {
        return $this->value[count($this->value) - 1];
    }

    /**
     * Iterate over each element in the Arr and run a provided callback over each.
     *
     * @param  callable  $fn
     * @return Arr
     */
    public function map(callable $fn)
    {
        $arr = [];

        foreach ($this->value as $index => $value)
            $arr[] = $fn($value, $index);

        return new Arr($arr);
    }

    /**
     * Filter elements into a new Arr for which the iteratee returns truthy.
     *
     * @param  callable  $fn
     * @return Arr
     */
    public function filter(callable $fn)
    {
        $arr = [];

        foreach ($this->value as $index => $value)
            if ($fn($value, $index)) $arr[] = $value;

        return new Arr($arr);
    }

    /**
     * Join the elements in the arr into a string by a provided delimiter.
     *
     * @param  string  $delim  Provided delimiter
     * @return string
     */
    public function join($delim)
    {
        return implode($delim, $this->value);
    }

    /**
     * @alias join
     */
    public function implode($delim)
    {
        return $this->join($delim);
    }

    /**
     * Map and reduce a collection of objects or arrays at once to a single value.
     *
     * @param  string  $prop
     * @param  callable  $fn
     * @return mixed
     */
    public function mapReduce($prop = '', callable $fn)
    {
        return $this->reduce(function ($value, $carry) use ($prop, $fn) {
            $mapped = is_array($value) ? $value[$prop] : $value->{$prop};

            return $fn($mapped, $carry);
        });
    }

    /**
     * Sort the Arr with merge sort given a comparison function
     *
     * @param  callable $fn  Comparator to use
     * @return Arr
     */
    public function mergeSort(callable $fn)
    {
        if ($this->count() <= 1)
            return new Arr($this->value);

        $median = (int) ($this->count() / 2);

        $a_merged = $this->slice(0, $median)->mergeSort($fn);
        $b_merged = $this->slice($median)->mergeSort($fn);

        $arr = [];

        $i = 0;
        $j = 0;

        for ($k = 0; $k < $this->count(); $k += 1) {
            $a_element = $a_merged[$i] ?? null;
            $b_element = $b_merged[$j] ?? null;

            if (is_null($a_element) || is_null($b_element))
                break;

            if ($fn($a_element, $b_element) < 1) {
                $arr[] = $a_element;
                $i += 1;
            } else {
                $arr[] = $b_element;
                $j += 1;
            }
        }

        for ($i; $i < $a_merged->count(); $i += 1)
            $arr[] = $a_merged[$i];

        for ($j; $j < $b_merged->count(); $j += 1)
            $arr[] = $b_merged[$j];

        return new Arr($arr);
    }

    /**
     * @alias last
     */
    public function tail()
    {
        return $this->last();
    }

    /**
     * Reduce an Arr to a single value.
     *
     * @param  mixed  $carry  Initial value of the carry
     * @param  callable $fn  Reducer function to call
     * @return mixed
     */
    public function reduce(...$args)
    {
        $arr = $this->value;

        $fn = array_pop($args);

        $result = $args[0] ?? null;

        foreach ($arr as $value) {
            $result = $fn($value, $result);
        }

        return $result;
    }

    /**
     * Reverse the Arr into a new Arr.
     *
     * @return Arr
     */
    public function reverse()
    {
        return new Arr(array_reverse($this->value));
    }

    /**
     * Get the raw value of the Arr.
     *
     * @return array
     */
    public function value() : array
    {
        return $this->value;
    }

    /**
     * Get the value at a given offset
     *
     * @param  int $offset  Offset to retrieve
     * @return mixed
     */
    public function at(int $offset)
    {
        return $this->value[$offset] ?? null;
    }

    /**
     * @alias
     */
    public function get(int $offset)
    {
        return $this->at($offset);
    }

    /**
     * Set the value at a given index
     *
     * @param  int $offset  Offset at which to place the value
     * @param  mixed $value  Value to place
     * @return Arr
     */
    public function set(int $offset, $value)
    {
        $set = $this->value;

        $set[$offset] = $value;

        return new Arr($set);
    }

    /**
     * Slice the Arr from $start to $end
     *
     * @param  int  $start
     * @param  mixed  $end
     * @return Arr
     */
    public function slice($start = 0, $end = null)
    {
        $arr = [];

        $end = $end ?: $this->count();

        for ($i = $start; $i < $end; $i += 1) {
            $arr[] = $this->at($i);
        }

        return new Arr($arr);
    }

    /**
     * Get the values of the Arr that are unique.
     *
     * @return Arr
     */
    public function unique()
    {
        $arr = [];

        $seen = [];

        for ($i = 0; $i < $this->count(); $i += 1) {
            $value = $this->value[$i];

            if (! isset($seen[$value])) {
                $arr[] = $value;
                $seen[$value] = true;
            }
        }

        return new Arr($arr);
    }

    /**
     * Determine if the given array is associative given the following:
     * - Empty arrays are sequential
     * - 0 < string keys in the array makes it associative
     *
     * @param  array $arr  array to examine
     * @return bool
     */
    public static function isAssociative(array $arr)
    {
        foreach ($arr as $key => $value)
            if (is_string($key)) return true;

        return false;
    }
}
