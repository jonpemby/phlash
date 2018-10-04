<?php

namespace Phlash\Support;

trait CountableTrait
{
    public function count()
    {
        return count($this->value);
    }
}
