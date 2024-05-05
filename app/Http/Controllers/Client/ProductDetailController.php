<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminProduct;
use Illuminate\Http\Request;
use DB;

class ProductDetailController extends Controller
{
    public function index(){
        $data = AdminProduct::all();
        return view('/client/pages/product_detail', compact('data'));
    }

    public function show($id)
    {
        $product = AdminProduct::find($id);
        $data = AdminProduct::paginate(12);
        $cateproduct = DB::table('admin_products')
                    ->select('category', DB::raw('COUNT(*) as product_count'))
                    ->groupBy('category')
                    ->get();
        // Kiểm tra xem sản phẩm có tồn tại không
        if (!$product) {
            abort(404); // Nếu không tìm thấy sản phẩm, trả về trang 404
        }

        return view('/client/pages/product_detail', compact('product', 'cateproduct'));
    }
    
}
