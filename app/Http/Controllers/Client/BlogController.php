<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function index(){
        $blogs = DB::table('blogs_models')->get()->partition(5);
        return view('/client/pages/blogs', ['blogs' => $blogs]);
    }

    public function blogs_single(){

    }

   
}
