<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('/client/pages/register');
    }

    // public function register(Request $request){
    //    $user = new User();

    //    $user->name = $request->name;
    //    $user->email = $request->email;
    //    $user->password = Hash::make($request->password);

    //    $user->save();

    //    return back()->with('success', 'Đăng ký thành công');
    // }

    public function register(Request $request)
    {
    
    $user = new User();

    
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password); 

    
    $user->save();

   
    return back()->with('success', 'Đăng ký thành công');
    }
}
