<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsTechAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()) {
            if (auth()->user()->isTechAdmin()) {
                return $next($request);
            }
            else if(auth()->user()->isSuperAdmin()) {
                return redirect('super');
            }
            else if (auth()->user()->isAdmin()) {
                return redirect('admin');
            }
            return redirect('home');
        }
        else {
            return redirect('login');
        }
    }
}
