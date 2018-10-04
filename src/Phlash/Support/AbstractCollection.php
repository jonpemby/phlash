<?php

namespace Phlash\Support;

use ArrayAccess;
use Countable;
use Iterator;
use JsonSerializable;

abstract class AbstractCollection implements ArrayAccess, Countable, Iterator, JsonSerializable
{
    use ArrayAccessTrait,
        CountableTrait,
        IteratorTrait,
        JsonTrait;

    /**
     * @param  string  $prop  Key to access
     * @return mixed
     */
    public function __get($prop)
    {
        return $this->value[$prop];
    }

    /**
     * @param  string  $prop  Key to set
     * @param  mixed   $value Value to set
     * @return mixed
     */
    public function __set($prop, $value)
    {
        $this->value[$prop] = $value;
    }

    /**
     * Returns an array representation of the Obj
     *
     * @return array
     */
    public function toArray()
    {
        return (array) $this->value;
    }

    /**
     * Returns a stdClass representation of the obj
     *
     * @return stdClass
     */
    public function toObject()
    {
        return (object) $this->value;
    }
}
