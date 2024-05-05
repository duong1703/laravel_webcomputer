<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('/client/pages/login');
    }

    public function login(Request $request)
    {
        // Kiểm tra xác thực đăng nhập của khách hàng
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('customer')->attempt($credentials)) {
             // Đăng nhập thành công, lưu tên khách hàng vào session
        $customer = Auth::guard('customer')->user();
        session(['customer_name' => $customer->name]);

            // Đăng nhập thành công, chuyển hướng đến trang sau khi đăng nhập
            return redirect('/views/client/pages/home');
        } else {
            // Đăng nhập không thành công, chuyển hướng lại với thông báo lỗi
            return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác.');
        }
    }

  
}