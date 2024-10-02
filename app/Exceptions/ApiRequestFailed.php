<?php

namespace App\Exceptions;

use Exception;

class ApiRequestFailed extends Exception
{
    public static function create()
    {
        return new static("API request failed");
    }
}
