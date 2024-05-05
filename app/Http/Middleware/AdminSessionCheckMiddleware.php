<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminSessionCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->isAdmin()) { // Kiểm tra người dùng có phải là admin hay không
            if (!$request->session()->has('admin_session_check')) {
                Auth::logout(); // Đăng xuất người dùng
                return redirect('/views/admin/pages/login')->with('error', 'Your session has expired. Please login again.');
            }
        }
        return $next($request);
    }
}
