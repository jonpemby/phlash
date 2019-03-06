<?php

namespace Phlash;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use JsonSerializable;

abstract class BaseCollection implements
    ArrayAccess,
    Countable,
    IteratorAggregate,
    JsonSerializable
{
    /**
     * Iterable value wrapped by this collection.
     *
     * @var iterable
     */
    protected $value = null;

    /**
     * Create a new BaseCollection by wrapping the iterable value.
     *
     * @constructor
     * @param  iterable  $value
     */
    final public function __construct(iterable $value)
    {
        $this->value = $value;
    }

    /**
     * Unwrap the value from the collection.
     *
     * @return mixed
     */
    final public function value()
    {
        return $this->value;
    }

    /**
     * @alias
     * @see {\Phlash\BaseCollection::value}
     */
    final public function unwrap()
    {
        return $this->value;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->value);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize()
    {
        return is_array($this->value) ? $this->value : (array) $this->value;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists($offset)
    {
        return is_object($this->value) ? property_exists($this->value, $offset) : isset($this->value[$offset]);
    }
    
    /**
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        if (is_object($this->value)) {
            return $this->value->{$offset};
        } else {
            return $this->value[$offset];
        }
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetSet($offset, $value)
    {
        throw new Exception(sprintf("%s is not implemented for %s", __METHOD__, get_class($this)));
    }

    /**
     * {@inheritDoc}
     */
    final public function offsetUnset($offset)
    {
        throw new Exception(sprintf("%s is not implemented for %s", __METHOD__, get_class($this)));
    }

    /**
     * {@inheritDoc}
     */
    final public function count()
    {
        if ($this->value instanceof Countable) {
            return $this->value->count();
        } else {
            return count($this->value);
        }
    }
}
