<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Database\Seeders\AdminUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    public function AdminHome(){
        $totalAdminUser = DB::table('adminuser')->count();
        $totalAdminProduct = DB::table('admin_products')->count();
        $totalAdminBlog = DB::table('blogs_models')->count();
        
        return view('admin/pages/home', [
            'totalAdminUser' => $totalAdminUser,
            'totalAdminProduct' => $totalAdminProduct,
            'totalAdminBlog' => $totalAdminBlog
        ]);
    }

    public function getTotalAdminUsers()
    {
        $totalAdminUser = DB::table('adminuser')->count();
        return view('admin/pages/home', ['totalAdminUser' => $totalAdminUser]);
    }
}
