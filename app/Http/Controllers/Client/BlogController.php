<?php

namespace App\Http\Controllers\Client;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function index(){
        $data = DB::table('blogs_models')->get();
        return view('/client/pages/blogs', compact('data'));
    }

    public function blogs_single(){

    }

   
}
