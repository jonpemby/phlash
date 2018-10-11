<?php

namespace Phlash;

trait JsonTrait
{
    /**
     * @see JsonSerializable::jsonSerialize
     */
    public function jsonSerialize()
    {
        return $this->value;
    }
}
