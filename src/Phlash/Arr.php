<?php

namespace Phlash;

use ArrayAccess;
use Countable;
use Iterator;
use JsonSerializable;

class Arr implements Countable, ArrayAccess, Iterator, JsonSerializable
{
    /**
     * @var array  Internal representation of an array
     */
    protected $value = [];

    /**
     * @var int  Internal pointer of the Arr
     */
    private $position = 0;

    /**
     * @constructor
     * @param array  $value
     */
    public function __construct(array $value = [])
    {
        foreach (array_keys($value) as $key)
            if (! is_int($key)) throw new \Exception('Arr can only accept integers as keys');

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
            if ($fn($arr[count($arr) - 1])) {
                array_pop($arr);
            } else {
                break;
            }
        }

        return new Arr($arr);
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

    /**
     * Determine the number of items in the collection
     *
     * @return int  Number of elements in the Arr
     */
    public function count() : int
    {
        return count($this->value);
    }

    /**
     * Determine if an offset exists
     *
     * @param  mixed  $offset  Given offset
     * @return bool  True if the offset exists
     */
    public function offsetExists($offset)
    {
        return isset($this->value[$offset]);
    }


    /**
     * Get the value at a given offset
     *
     * @param  mixed  $offset  Given offset
     * @return mixed  Value at the given offset
     */
    public function offsetGet($offset)
    {
        return $this->value[$offset];
    }

    /**
     * Set the value at a given offset
     *
     * @param  mixed  $offset  Given offset
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        $this->value[$offset] = $value;
    }

    /**
     * Unset the value at a given offset
     *
     * @param  mixed  $offset  Given offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->value[$offset]);
    }

    /**
     * Reset the internal pointer to 0
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Get the value at the current position
     *
     * @return mixed
     */
    public function current()
    {
        return $this->value[$this->position];
    }

    /**
     * Get the current position
     *
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Increment the pointer to the next position
     *
     * @return void
     */
    public function next()
    {
        $this->position += 1;
    }

    /**
     * Determine if an offset is valid
     *
     * @return bool
     */
    public function valid()
    {
        return isset($this->value[$this->position]);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return $this->value;
    }
}
