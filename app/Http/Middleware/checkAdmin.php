<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // if (Auth::check()) {
        //     if (Auth::user()->role == '0') {
        //         return $next($request);
        //     } else {
        //         return redirect()->route('formLogin');
        //     }
        // } else {
        //     return response()->json([
        //         'status' => 401,
        //         'messages' => 'Bạn cần đăng nhập trước khi vào hệ thống'
        //     ]);
        // }

        if(!session()-> has('loggedInUser')){
            return redirect() -> route('formLogin');
        }

        return $next($request);
    }
}
