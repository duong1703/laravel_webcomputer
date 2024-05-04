<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     public function listComment(){
        return view('admin/pages/comment/list');
     }
}
