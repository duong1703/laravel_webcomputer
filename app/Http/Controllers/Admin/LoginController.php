<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Adminlogin(){
        return view('admin/pages/login');
    }

    public function login(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Lấy email và mật khẩu từ request
        $email = $request->input('email');
        $password = $request->input('password');
    
        // Thực hiện xác thực thông qua model User hoặc AdminUser (tuỳ thuộc vào cách bạn lưu trữ người dùng)
        $user = AdminUser::where('email', $email)->first(); // Thay User bằng model tương ứng
    
        if ($user) {
            // Kiểm tra mật khẩu
            if (Hash::check($password, $user->password)) {
                $request->session()->put('name', $user->name);
                // Đăng nhập thành công
                // Auth::login($user); // Đăng nhập người dùng
                return redirect('views/admin/pages/home'); // Chuyển hướng đến trang dashboard
            } else {
                // Đăng nhập thất bại - sai mật khẩu
                return redirect()->back()->withInput($request->only('email'))->withErrors([
                    'password' => 'Password không chính xác.',
                ]);
            }
        } else {
            // Đăng nhập thất bại - không tìm thấy người dùng với email đã nhập
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'email' => 'Email không chính xác.',
            ]);
        }
    }
    

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('/views/admin/pages/login');
    }
}
