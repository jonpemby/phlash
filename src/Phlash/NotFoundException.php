<?php

namespace Phlash;

use Exception;

class NotFoundException extends Exception
{
    public function __construct(...$args)
    {
        super("Element not found by findOrFail", ...$args);
    }
}
