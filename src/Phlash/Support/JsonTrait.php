<?php

namespace Phlash\Support;

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
