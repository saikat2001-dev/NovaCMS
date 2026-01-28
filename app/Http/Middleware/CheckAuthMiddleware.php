<?php

namespace App\Http\Middleware;

use App\Models\Auth;
use Closure;
use Illuminate\Http\Request;

class CheckAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::checkAuth()) {
            return redirect()->route('login');
        }

        return $next($request);
    }
}
