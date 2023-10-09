<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
  

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
 public function handle($request, Closure $next, $role = null)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check the user's usertype (assuming 'usertype' is a field in your users table)
            $user = Auth::user();

            if ($user->role == $role) {
                return $next($request);
            }
        }

        // If not authenticated or usertype doesn't match, redirect to the login page
        return redirect('/login');
    }

}
