<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            return $next($request); // Izinkan admin
        }

        return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
