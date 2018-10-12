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

    /**
     * Generate a random number between `$lower` and `$higher`, optionally a floating point number.
     *
     * @param  int|float  $lower   Lower bound of the random number
     * @param  int|float  $higher  Higher bound of the random number
     * @param  bool       $floating  Determine if the value should be floating point
     * @return Num
     */
    public static function random($lower = 0, $higher = 1, $floating = false)
    {
        if ($higher <= $lower)
            throw new \InvalidArgumentException("Upper bound cannot be less than or equal to lower bound");

        $value = (float) mt_rand($lower, $higher) / $higher;

        $value *= $higher;

        if (! $floating)
            $value = (int) $value;

        return new static($value);
    }

    /**
     * Get the primitive value of the Num.
     *
     * @return number
     */
    public function value()
    {
        return $this->value;
    }
}

