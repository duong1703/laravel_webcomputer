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

    public function register(Request $request){
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/login')->with('success', "Account successfully registered.");
    }
}
