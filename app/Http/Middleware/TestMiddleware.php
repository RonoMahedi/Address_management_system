<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::check()){
        //   if(Auth::user()->usertype=="Admin"){
        //     return redirect()->route()
        //   }elseif(Auth::user->usertype=="User")
        //   {
        //     return redirect()->route()
        //   }
        //   return $next($request);
        // }else{
        //   return redirect('/login');
        // }
        if(Auth::check()){
           return $next($request);
         }else{
           return redirect('/login');
         }
    }
}
