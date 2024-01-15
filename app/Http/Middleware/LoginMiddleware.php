<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('account')->id() > 0) {
            $user = Auth::guard('account')->user();

            switch ($user->status) {
                case 'ON':
                    switch ($user->function) {
                        case 0:
                            return redirect()->route('page.index');
                        default:
                            return $next($request);
                    }

                case 'OFF':
                    Auth::logout();
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                    return redirect()->route('page.login')->with('error', 'Tài khoản đã bị khóa. Vui lòng liên hệ quản trị viên để được hỗ trợ.');
            }
        }
        return $next($request);
    }
}
