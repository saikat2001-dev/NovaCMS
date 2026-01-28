<?php

use App\Exceptions\BaseException;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckAuthMiddleware;
use App\Http\Middleware\CheckRoleMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/index.php',
        // api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web'])->prefix('auth')->group(__DIR__.'/../routes/auth.route.php');
            Route::middleware(['web'])->prefix('user')->group(__DIR__.'/../routes/user.route.php');
            Route::middleware(['web'])->prefix('admin')->group(__DIR__.'/../routes/admin.route.php');
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'checkAuth' => CheckAuthMiddleware::class,
            'checkAdmin' => CheckAdminMiddleware::class,
            'guest' => RedirectIfAuthenticated::class,
            'role' => CheckRoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (BaseException $e, Request $request) {
            if ($request->expectsJson()) {
                return response()->json(['errors' => $e->getErrors()], 422);
            }

            return redirect()->back()->withErrors($e->getErrors())->withInput();
        });
    })->create();
