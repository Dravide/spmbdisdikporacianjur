<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $role = Auth::user()->role;
            return match ($role) {
                'nara' => redirect()->route('nara.home'),
                'cpdb' => redirect()->route('pendaftaran.beranda'),
                'operator' => redirect()->route('operator.home'),
                default => redirect()->route('login'),
            };
        }

        return $next($request);
    }
}
