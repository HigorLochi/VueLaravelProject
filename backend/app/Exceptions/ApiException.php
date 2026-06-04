<?php

namespace App\Exceptions;

use Exception;

abstract class ApiException extends Exception
{
    protected int $statusCode = 500;

    public function statusCode(): int
    {
        return $this->statusCode;
    }
}
