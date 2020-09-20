<?php

namespace App\Http\Middleware;

use Closure;

class LoginCheck
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
        if (!session('login')or !session('admin_id') or !session('admin_name')){
			session()->flash('msg',"You Must be log in first");
            return redirect('admin/login');
        }

        return $next($request);
    }
}