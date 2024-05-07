<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;
use Session;


class LoginController extends Controller
{
    public function index(){
        return view('/client/pages/login');
    }

    // public function login(Request $request)
    // {
    //     // $credetials = [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ];


        // if(Auth::attempt($credetials)){
        //     return redirect()->route('homepage')->with('success', 'Đăng nhập thành công');
        // }
        // return back()->with('error', 'Đăng nhập thất bại');
        // dd($request->all());

        ///////////////////


        // if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
        //     return redirect()->route('homepage');
        // }
        // return back()->with('error', 'Đăng nhập thất bại');

    // }

    public function login(Request $request)
    {
  
    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
      
        Auth::login($user);
        return redirect()->route('homepage')->with('success', 'Đăng nhập thành công');
    }

    
    return back()->with('error', 'Đăng nhập thất bại');
    }
    
  

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login')->with('success', 'Bạn đã đăng xuất thành công.');
    }
    
    }
    




  