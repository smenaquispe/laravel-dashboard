<?php

namespace App\Exceptions;

use Exception;


class OutsideWorkingHours extends Exception
{    
    public static function create()
    {
        return new static("Access denied. Outside working hours.");    
    }
}
