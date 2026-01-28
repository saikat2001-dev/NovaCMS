<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

abstract class BaseException extends Exception
{
    protected $errors = [];
    protected $status = 400;

    public function render(Request $request) {
        return response()->json([
            'status' => 'error',
            'error' => class_basename($this),
            'message' => $this->getMessage(),
            'errors' => $this->getErrors(),
            'statusCode' => $this->status,
        ], $this->status);
    }

    abstract public function getErrors(): array;
}