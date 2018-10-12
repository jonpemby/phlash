<?php

namespace Phlash;

abstract class Util extends AbstractPhlashClass
{
    /**
     * @var string  Regex to match path values
     */
    const TO_PATH_REGEX = '/(\w)+|(\d)+/';

    /**
     * Destructure a path array from a path string
     *
     * @param  string  $value
     * @return array
     */
    public static function toPath(string $value = '') : array
    {
        if (empty($value))
            return [];

        $out = [];

        preg_match_all(static::TO_PATH_REGEX, $value, $out);

        return $out[0] ?? [];
    }
}

