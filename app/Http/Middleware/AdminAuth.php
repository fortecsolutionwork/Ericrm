<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
       // $response = $next($request);
        if (Auth::user()->fk_role_id == 1) {
           return $next($request);
        }else{ 
            return redirect()->route('unauthorized');
        }
        

    }
}
