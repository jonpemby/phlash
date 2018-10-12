<?php

namespace Phlash;

class Num extends AbstractPhlashClass
{
    /**
     * @var number  Represents the internal value of the Num
     */
    protected $value = 0;

    /**
     * Creates a new instance of Num
     *
     * @param  number  $value
     */
    public function __construct($value = 0)
    {
        if (! is_int($value) && ! is_float($value))
            throw new \InvalidArgumentException;

        $this->value = $value;
    }
}

