<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminProduct;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
   public function index(){
      
      $data = AdminProduct::all();
      return view('/client/pages/home',compact('data') );
   }

   

  
}
