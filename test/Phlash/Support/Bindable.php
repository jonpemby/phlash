<?php

namespace Phlash\Tests\Support;

class Bindable
{
    protected $value = 0;

    public function __construct($value = 0)
    {
        $this->value = $value;
    }

    public function square()
    {
        $this->value = $this->value * $this->value();
    }

    public function value($value = null) : int
    {
        if (is_null($value))
            return $this->value;

        $this->value = $value;
    }
}
