<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's role matches 'Recruter'
            if (Auth::user()->role === 'Recruter') {
                return $next($request); // Allow the request to proceed
            }

            // If the user is authenticated but not a 'Recruter', abort with a 403 error
            // abort(403, 'Unauthorized: You must be a Recruter to access this page.');
        }

        // If the user is not authenticated, redirect to the 'welcome' route
        return redirect()->route('welcome');

    }
}
