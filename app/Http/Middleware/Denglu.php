<?php

namespace App\Http\Middleware;

use Closure;

class Denglu
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
        $users=session('users');
        if(!$users){
            return redirect("/Login");
        }
        return $next($request);








    }
}
