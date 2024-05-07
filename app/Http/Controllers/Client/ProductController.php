<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\AdminProduct;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index(Request $request){
            $data=[];
        if($request->get('category')){
            $data = DB::table('admin_products')->where('category', $request->get('category'))->get();
          
        }else{
            $data = AdminProduct::all(); 
        } 
        $data = AdminProduct::paginate(12); 
        $category = DB::table('admin_products')
                    ->select('category', DB::raw('COUNT(*) as product_count'))
                    ->groupBy('category')
                    ->get();  
                    
                   
        return view('/client/pages/product', compact('data','category'));
    }

    

    public function cart()
    {
        return view('/client/pages/cart');
    }

    public function addToCart($id)
    {

       
        $product = AdminProduct::findOrFail($id);
          
        $cart = session()->get('cart', []);
        // dd(session()->get('cart', []));
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "total"=> $product->total,
                "images"=> $product->images,
                "quantity" => 1,
                "price" => $product->price,
            ];
            
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');

      
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

 public function removeItemFromCart($itemId)
{
    // Bước 1: Lấy danh sách các mục trong giỏ hàng từ session
    $cart = session('cart');

    // Bước 2: Xác định id của mục bạn muốn xóa

    // Bước 3: Kiểm tra xem mục có tồn tại trong giỏ hàng không
    if (isset($cart[$itemId])) {
        // Bước 4: Nếu mục tồn tại, sử dụng unset() để xóa nó khỏi mảng giỏ hàng
        unset($cart[$itemId]);

        // Bước 5: Gán lại giỏ hàng sau khi đã xóa mục
        session(['cart' => $cart]);

        // Bước 6: In ra thông báo hoặc thực hiện các công việc khác nếu cần
        return redirect()->back()->with('success', 'Mục đã được xóa khỏi giỏ hàng thành công.');
    } else {
        // Nếu mục không tồn tại trong giỏ hàng, bạn có thể in ra thông báo hoặc thực hiện các công việc khác.
        return redirect()->back()->with('error', 'Không tìm thấy mục trong giỏ hàng.');
    }
}

    
}