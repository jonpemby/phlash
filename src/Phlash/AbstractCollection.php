<?php

namespace Phlash;

use ArrayAccess;
use BadMethodCallException;
use Countable;
use Iterator;
use JsonSerializable;

abstract class AbstractCollection extends AbstractPhlashClass implements ArrayAccess, Countable, Iterator, JsonSerializable
{
    use ArrayAccessTrait,
        CountableTrait,
        IteratorTrait,
        JsonTrait;

    /**
     * @var array  Internal representation of a collection
     */
    protected $value;

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
     * Calls the $interceptor on the collection and returns $this.
     *
     * @return $this
     */
    public function tap(callable $interceptor)
    {
        $interceptor($this->value);

        return $this;
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

    /**
     * Dynamically assess whether a function exists on the object
     * and route calls to a snake-cased or studly cased method
     * to the correct method if it cannot be found first.
     *
     * @param  string  $method  Name of the method
     * @param  arrray  $args    Arguments passed to the method
     * @throws BadMethodCallException  if a method does not exist
     */
    public function __call($method, $args)
    {
        if (method_exists($this, $method)) {
            return $this->{$method}(...$args);
        }

        $camelCased = Str::from($method)->camelCase()->value();

        if (method_exists($this, $camelCased)) {
            return $this->{$camelCased}(...$args);
        }

        throw new BadMethodCallException(sprintf('%s does not exist', $method));
    }
  
    /**
     * Checks if the `$fn` returns truthy for all elements.
     *
     * @param  callable $fn
     * @return bool
     */
    public function every($fn) : bool
    {
        $falsey = Func::negate($fn);

        foreach ($this->value as $key => $value) {
            if ($falsey($value, $key)) return false;
        }
        
        return true;
    }

    /**
     * Create a new object with keys transformed by calling the specified
     * `$fn` and map-invoking over each value + key of the collection.
     *
     * @return Phlash\Obj
     */
    public function keyBy(callable $fn)
    {
        $obj = [];

        foreach ($this->value as $key => $value) {
            $obj[$fn($value, $key)] = $value;
        }

        return new Obj($obj);
    }
}
