<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Auth;

class CheckAdminMiddleware
{
  public function handle(Request $request, Closure $next)
  {
    if (!Auth::checkAuth()) {
      return redirect()->route('login');
    }
    return $next($request);
  }
}