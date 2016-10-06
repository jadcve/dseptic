<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class Operator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $redirectTo = '/home';
    
//     public function __construct(Guard $auth)
//    {
//        $this->auth = $auth;
//    }
    
    public function handle($request, Closure $next)
    {
        if(!Auth::check()  ) {
            return redirect()->guest('auth/login');
        } else if(Auth::user()->rol_id != 2){
            return redirect()->guest('auth/login');
        }

            return $next($request);
    }
}
