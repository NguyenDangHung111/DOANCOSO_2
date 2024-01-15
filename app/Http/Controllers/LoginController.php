<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\AccountServiceInterface as AccountService;
use App\Http\Requests\Login_Request;
use App\Http\Requests\Register_Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    protected AccountService $accountService;
    public function __construct(AccountService $accountService)
    {
             $this->accountService = $accountService;
    }

    public function page_login()
    {
        return view('login');
    }

    public function login(Login_Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::guard('account')->attempt($credentials)) {
            $user = Auth::guard('account')->user();

            if($user->status == 'OFF') {
                Auth::guard('account')->logout();
                return redirect()->route('page.login')->with('error', 'Tài khoản đã bị khóa. Vui lòng liên hệ quản trị viên để được hỗ trợ.');
            }else
            // Kiểm tra giá trị của cột 'function'
            if ($user->function == 1) {
                return redirect()->route('page.dashboard')->with('success', 'Đăng Nhập Thành Công');
            } elseif ($user->function == 0) {
                return redirect()->route('page.index')->with('success', 'Đăng Nhập Thành Công');
            }
        }

        return redirect()->route('page.login')->with('error', 'Email hoặc mật khẩu không chính xác');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('page.index')->with('info', 'Đăng Xuất Thành Công');
    }

    public function register(Register_Request $request)
    {

        if ( $this->accountService->register($request)) {
            return redirect()->route('page.login')->with('success', 'Tạo Tài Khoản Thành Công');
        } else {
            return redirect()->route('page.login')->with('error', 'Tạo Tài Khoản Không Thành Công');
        }
    }
}
