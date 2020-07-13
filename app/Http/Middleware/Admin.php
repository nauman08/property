<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
         if(Auth::user()){
              $Roletype=Auth::user()->role;
            if($Roletype == 1){
               return $next($request);
            } else {
             return redirect('/');

           }
        }
        else {
           return redirect()->route('login');
        }

    }
}
