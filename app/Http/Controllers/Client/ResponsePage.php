<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponsePage extends Controller
{
    public function thankspage(){
        return view('/client/pages/thankspage');
    }
}
