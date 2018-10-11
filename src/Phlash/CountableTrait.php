<?php

namespace Phlash;

trait CountableTrait
{
    public function count()
    {
        return count($this->value);
    }
}
