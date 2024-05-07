<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminProduct;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
   public function index(){
      
      $data = AdminProduct::all();
      $data = AdminProduct::take(9)->get();
      return view('/client/pages/home',compact('data') );
   }

//    public function home(){
//       if(Auth::check()){
//           return view('/client/pages/home');
//       }

//       return redirect('/views/client/pages/login');
//   }

}
