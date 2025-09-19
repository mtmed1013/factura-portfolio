<?php

namespace App\Exceptions;

use Exception;

class CustomHttpException extends Exception
{
    protected $httpCode;

    public function __construct($message = "", $httpCode = 400)
    {
        parent::__construct($message);
        $this->httpCode = $httpCode;
    }

    public function getHttpCode()
    {
        return $this->httpCode;
    }
}
