<?php

namespace App\Exceptions;

class ReportNotFoundException extends ApiException
{
    protected int $statusCode = 404;

    public function __construct() {
        parent::__construct("City not found");
    }
}
