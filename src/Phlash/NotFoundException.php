<?php

namespace Phlash;

use Exception;

class NotFoundException extends Exception
{
    /**
     * @var string  Default error message of the exception
     */
    const DEFAULT_MESSAGE = 'Element not found by findOrFail';

    /**
     * @constructor
     */
    public function __construct($message = self::DEFAULT_MESSAGE, ...$args)
    {
        parent::__construct($message, ...$args);
    }
}
