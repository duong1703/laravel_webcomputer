<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AdminProduct;

class ProductController extends Controller
{
    public function index(){
        $products = AdminProduct::all();
        return view('/client/pages/product');
    }

    public function showCategories()
    {
        $categories = AdminProduct::find('category');
        return view('views/client/pages/product_detail', ['categories' => $categories]);
    }
}
