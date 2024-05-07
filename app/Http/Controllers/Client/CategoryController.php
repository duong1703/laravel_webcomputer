<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminProduct;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category = null)
    {
        $categories = AdminProduct::uniqueCategories();
        return view('views/client/pages/product_detail', compact('categories'));
    }

    public function categories($category)
        {
           //make this variable singular not plural..its easier to read/understand
            $category = AdminProduct::with('product')->find($category); 
    
            return view('products.categories')->with('products', $category);
        }

    
}
