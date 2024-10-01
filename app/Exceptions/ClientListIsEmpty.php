<?php

namespace App\Exceptions;

use Exception;

class ClientListIsEmpty extends Exception
{
    public static function create()
    {
        return new static('Client list is empty');
    }
}
