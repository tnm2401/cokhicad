<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Lang
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
        if (Session::has('locale')) {
           app()->setlocale(Session::get('locale'));
           // $lang = Session::get('locale');
        } 
        return $next($request);
    }
}
