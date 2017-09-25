<?php

namespace App\Http\Middleware;

use Closure;

class Login
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




        if(session()->has('user')){
            return $next($request);
        }
        return redirect('admin/login')->with('errors','请走大门，不要翻墙');

    }


}
