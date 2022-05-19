<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccountMiddleware
{
    private $account;
    public function __construct(){

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, $guard = 'account')
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }
        return redirect()->route('frontend.home.login')->with('error','Bạn cần đăng nhập để đặt hàng');

        // if (!Auth::guard($guard)->check()) {
        //     return redirect()->route('frontend.account.login')->with('error','Bạn cần đăng nhập để đặt hàng');
        // }
        //     return $next($request);
    }
}
