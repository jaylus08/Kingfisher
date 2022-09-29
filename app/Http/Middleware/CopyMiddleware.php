<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CopyMiddleware
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
            // Copy usertype = 5
        if(\Auth::user()->user_type == '5'){
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
