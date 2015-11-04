<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('auth/login');
        }

        if (Auth::user()->role <> "admin") {
            \Flash::warning('Você está tentando acessar uma área restrita!');
            return redirect('home');
        }

        return $next($request);
    }
}
