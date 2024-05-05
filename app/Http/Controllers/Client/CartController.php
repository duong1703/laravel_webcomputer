<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminProduct;
use Illuminate\Http\Request;
use App\Cart;
use Session;
use DB;

class CartController extends Controller
{
    public function index()
    {
        $data = DB::table('admin_products')->get();
        return view('index', compact('data'));
    }

    // public function AddCart( Request $req ,$id){
        
    //     $product = DB::table('admin_products')->where('id', $id)->first();
        
    //     if($product != null){
    //         $oldcart = Session('Cart') ? Session('Cart') : null;
    //         $newcart = new Cart($oldcart);
    //         $newcart->AddCart($product, $id);
    //         $req->Session()->put('Cart', $newcart);
    //         ;
    //     }
    //     return view('client/pages/cart', ['newcart' => $newcart]);
    //     // // return $this->showCart();

    
    // }


    public function AddCart(Request $req, $id)
    {
    // Kiểm tra xem sản phẩm có tồn tại hay không
    $product = DB::table('admin_products')->where('id', $id)->first();

    if ($product != null) {
        // Khởi tạo giỏ hàng mới nếu chưa tồn tại
        $oldcart = Session::has('Cart') ? Session::get('Cart') : null;
        $newcart = new Cart($oldcart);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay không
        if ($newcart->items && array_key_exists($id, $newcart->items)) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng lên một
            $newcart->items[$id]['quantity']++;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm sản phẩm vào giỏ hàng
            $newcart->AddCart($product, $id);
        }

        // Lưu giỏ hàng mới vào session
        $req->session()->put('Cart', $newcart);
    }

    // Chuyển hướng đến trang giỏ hàng và truyền giỏ hàng mới vào view
    return redirect()->route('viewcart')->with('newcart', $newcart);
    }


    public function DeleteItemCart(Request $req , $id){
        $oldcart = session('Cart') ? session('Cart'): null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if(count($newcart->products)> 0){
            $req->session()->put('Cart', $newcart);
        }else{
            $req->session()->forget('Cart');
        }
        return view('client/pages/cart');
    }

    public function getCartItems()
    {
        // Lấy dữ liệu từ session giỏ hàng
        $cart = session()->get('Cart', []);
        
        // Xử lý dữ liệu giỏ hàng nếu cần
        dd($cart);
        // Truyền dữ liệu giỏ hàng vào view
        return view('client/pages/cart', ['cartItems' => $cart]);
    }
    
}
