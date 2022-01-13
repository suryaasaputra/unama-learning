<?php

namespace App\Http\Middleware;

use Closure;

class Guru
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
        if(\Auth::user()->akses!='guru'){
            
            abort(401,'Anda tidak diizinkan mengakses halaman ini');

        }

        return $next($request);
    }
}
