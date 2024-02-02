<?php

namespace App\Exceptions;

use App\Builder\ResponseApi;
use App\Builder\ReturnApi;
use Exception;

class Execptions extends Exception
{
    protected $code = 400;
    protected $message = "";

    public function render()
    {
        return ResponseApi::messageResponse(true, $this->message, $this->getMessage(), null, $this->code);
    }
}
