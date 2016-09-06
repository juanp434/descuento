<?php

namespace App\Http\Middleware;

use Closure;

class ShopAuth
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
        if (Auth::check()) {
           if (Auth::user()->role == 'shop' ){
                return $next($request);
           }
           else{
                Auth::logout();
                return redirect('/');
           }
        }
        else{
           return redirect('/');
        }
    }
}
