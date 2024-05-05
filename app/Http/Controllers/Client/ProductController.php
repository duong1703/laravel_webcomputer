<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use DB;
use App\Models\Admin\AdminProduct;

class ProductController extends Controller
{
    public function index(){
        
        $data = AdminProduct::all();
        $data = AdminProduct::paginate(12);
        $cateproduct = DB::table('admin_products')
                    ->select('category', DB::raw('COUNT(*) as product_count'))
                    ->groupBy('category')
                    ->get();
        return view('/client/pages/product', compact('data','cateproduct'));
    }

    

    public function cart()
    {
        return view('/client/pages/cart');
    }

    public function addToCart($id)
    {

       
        $product = AdminProduct::findOrFail($id);
          
        $cart = session()->get('cart', []);
        
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "image" => $product->image,
                "name" => $product->name,
                "total"=> $product->total,
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

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}