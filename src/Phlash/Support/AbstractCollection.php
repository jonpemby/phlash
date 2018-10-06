<?php

namespace Phlash\Support;

use ArrayAccess;
use BadMethodCallException;
use Countable;
use Iterator;
use JsonSerializable;
use Phlash\Str;

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

    public function __call($method, $args)
    {
        if (method_exists($this, $method)) {
            return $this->{$method}(...$args);
        }

        $camelCased = Str::from($method)->camelCase()->value();

        if (method_exists($this, $camelCased)) {
            return $this->{$camelCased}(...$args);
        }

        throw new BadMethodCallException(sprintf('%s does not exist', __METHOD__));
    }
}
