<?php

namespace Phlash;

class Str
{
    /**
     * @var string  Find special characters
     */
    const SPECIAL_CHARACTERS_REGEX = '/[^A-Za-z0-9]+/';

    /**
     * @var string  Internal value of the Str
     */
    protected $value;

    /**
     * @constructor
     */
    public function __construct($value = '')
    {
        $this->value = $value;
    }

    /**
     * Create a new Str from a given string
     *
     * @param  string  $value
     * @return Str
     */
    public static function from(string $value)
    {
        return new static($value);
    }

    /**
     * Format the string as camel-cased.
     *
     * @return Str
     */
    public function camelCase()
    {
        $camelCased = Arr::from(preg_split(static::SPECIAL_CHARACTERS_REGEX, $this->value))->filter(function ($v) {
            return ! empty($v);
        })->map(function ($word, $i) {
            return $i > 0 ? ucfirst($word) : lcfirst($word);
        })->join('');

        return new Str($camelCased);
    }

    /**
     * Return an Arr w/ all of the characters present in the Str
     *
     * @return Arr
     */
    public function chars()
    {
        $chars = [];

        for ($i = 0; $i < strlen($this->value); $i += 1)
            $chars[] = $this->value[$i];

        return new Arr($chars);
    }

    /**
     * @return string
     */
    public function value() : string
    {
        return $this->value;
    }
}
