<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
              // dd($Roletype);
            if($Roletype == 2){
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
