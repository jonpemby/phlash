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
        $camelCased = $this->words()->filter(function ($v) {
            return ! empty($v);
        })->map(function ($word, $i) {
            return $i > 0 ? ucfirst(strtolower($word)) : strtolower($word);
        })->join('');

        return new Str($camelCased);
    }

    /**
     * Format the string as kebab-cased.
     *
     * @return Str
     */
    public function kebabCase()
    {
        $kebabCased = $this->words()->filter(function ($v) {
            return ! empty($v);
        })->map(function ($word) {
            return strtolower($word);
        })->join('-');

        return new Str($kebabCased);
    }

    /**
     * @return Str
     */
    public function lowercase()
    {
        return new Str(strtolower($this->value));
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
     * Format the string as snake-cased.
     *
     * @return Str
     */
    public function snakeCase()
    {
        $snakeCased = $this->words()->filter(function ($v) {
            return ! empty($v);
        })->map(function ($word) {
            return strtolower($word);
        })->join('_');

        return new Str($snakeCased);
    }

    /**
     * Format the string as start-cased.
     *
     * @return Str
     */
    public function startCase()
    {
        $startCased = $this->words()->filter(function ($v) {
            return ! empty($v);
        })->map(function ($word) {
            return ucfirst($word);
        })->join(' ');

        return new Str($startCased);
    }

    /**
     * @return string
     */
    public function value() : string
    {
        return $this->value;
    }

    /**
     * Returns a collection of words in the string.
     *
     * @return Arr
     */
    public function words()
    {
        return new Arr(preg_split(static::SPECIAL_CHARACTERS_REGEX, $this->value));
    }
}
