<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LogoutContoller extends Controller
{
   
    public function perform()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}
