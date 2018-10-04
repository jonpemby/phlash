<?php

namespace Phlash\Support;

trait ArrayAccessTrait
{
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
}
