<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!$request->user() || !$request->user()->hasAnyRole($roles)) {
            return $this->redirectBasedOnRole($request->user());
        }
        return $next($request);
    }

    protected function redirectBasedOnRole($user): RedirectResponse
    {
        return match ($user->role) {
            'nara' => redirect()->route('nara.home'),
            'cpdb' => redirect()->route('pendaftaran.beranda'),
            'operator' => redirect()->route('operator.home'),
            default => redirect()->route('login'),
        };
    }
}
