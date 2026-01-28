<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof BaseException) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $exception->getErrors()], 422);
            } else {
                return redirect()->back()->withErrors($exception->getErrors())->withInput();
            }
        }

        return parent::render($request, $exception);
    }
}