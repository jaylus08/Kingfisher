<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SectionMiddleware
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
        if(\Auth::check()){
            // Section usertype = 4
        if(\Auth::user()->user_type == '4'){
            return $next($request);
        } else {
            abort(403);
        }

    } else {

        return redirect('/login');
    }

    return $next($request);
        
    }
}
