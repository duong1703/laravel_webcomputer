<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Database\Seeders\AdminUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    public function AdminHome(){
        $totalUsers = DB::table('adminuser')->count();
        return view('admin/pages/home', ['adminuser' => $totalUsers]);
    }
}
