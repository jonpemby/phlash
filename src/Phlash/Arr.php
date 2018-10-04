<?php

namespace Phlash;

use Phlash\Support\AbstractCollection;

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
        return new Arr(array_slice($this->value, 0, $n));
    }

    /**
     * @return Arr
     */
    public function dropWhile(callable $fn)
    {
        $arr = $this->value;

        while (true) {
            if (! count($arr)) break;

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
            if (! count($arr)) break;

            if ($fn($arr[count($arr) - 1])) {
                array_pop($arr);
            } else {
                break;
            }
        }

        return new Arr($arr);
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
        $found = null;

        foreach ($this->value as $v) {
            if ($fn($v)) {
                $found = $v;
                break;
            }
        }

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
        $index = -1;

        foreach ($this->value as $i => $v) {
            if ($fn($v)) {
                $index = $i;
                break;
            }
        }

        return $index;
    }

    /**
     * Find the last index of the value matched by the $fn.
     *
     * @param  callable $fn
     * @return int
     */
    public function findLastIndex(callable $fn)
    {
        $index = -1;

        for ($i = count($this->value) - 1; $i > -1; $i -= 1) {
            if ($fn($this->value[$i])) {
                $index = $i;
                break;
            }
        }

        return $index;
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
     * @alias last
     */
    public function tail()
    {
        return $this->last();
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
        return $this->value[$offset];
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
        $this->value[$offset] = $value;

        return new Arr($this->value);
    }
}
