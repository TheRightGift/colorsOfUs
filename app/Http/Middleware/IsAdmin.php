<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
            if(auth()->user()->isAdmin()) {
                return $next($request);
            }
            else if (auth()->user()->isTechAdmin()) {
                return redirect('tech_admin');
            }
            else if (auth()->user()->isSuperAdmin()) {
                return redirect('super');
            }
            return redirect('home');
        }
        else {
            return redirect('login');
        }
    }
}
