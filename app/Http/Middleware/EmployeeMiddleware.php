<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $user = Auth::user();

        if (!$user) {
            return redirect()->route('login.page');
        }

        if ($user->hasRole('Employee')) {
            abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
