<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    protected $message;

    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = "Error : ".$message;
    }

    public function errorMessage()
    {
        return $this->message;
    }
}
