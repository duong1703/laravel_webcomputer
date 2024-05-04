<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminProduct;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index(){
        $data = AdminProduct::all();
        return view('/client/pages/product_detail', compact('data'));
    }

    public function show($id)
    {
        $product = AdminProduct::find($id);

        // Kiểm tra xem sản phẩm có tồn tại không
        if (!$product) {
            abort(404); // Nếu không tìm thấy sản phẩm, trả về trang 404
        }

        return view('/client/pages/product_detail', compact('product'));
    }
}
