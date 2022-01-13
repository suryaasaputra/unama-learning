<?php

namespace App\Http\Middleware;

use Closure;

class Siswa
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
        if(\Auth::user()->akses!='siswa'){
            
            abort(401,'Anda tidak diizinkan mengakses halaman ini');

        }

        return $next($request);
    }
}
