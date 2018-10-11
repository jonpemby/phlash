<?php

namespace Phlash;

trait IteratorTrait
{
    /**
     * @see Iterator::rewind
     */
    function rewind() {
        return reset($this->value);
    }

    /**
     * @see Iterator::current
     */
    function current() {
        return current($this->value);
    }

    /**
     * @see Iterator::key
     */
    function key() {
        return key($this->value);
    }

    /**
     * @see Iterator::next
     */
    function next() {
        return next($this->value);
    }

    /**
     * @see Iterator::valid
     */
    function valid() {
        return key($this->value) !== null;
    }
}
