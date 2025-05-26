<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $lastActivity = session('last_activity');
            $sessionTimeout = config('session.lifetime') * 60; // Convert minutes to seconds

            if ($lastActivity && time() - $lastActivity > $sessionTimeout) {
                Auth::logout();
                session()->flush();
                return redirect('/login')->with('error', 'Your session has expired. Please log in again.');
            }

            session(['last_activity' => time()]);
        }

        return $next($request);
    }
}
