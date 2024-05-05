<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminProduct;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function listProduct(){
        $products = DB::table('admin_products')->get();
        return view('admin/pages/product/list', ['products' => $products]);
    }

    public function addProduct(){
        return view('admin/pages/product/add');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
            'status' => 'required|boolean',
            'price' => 'required|string',
            'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

            // Upload ảnh sản phẩm và lưu đường dẫn
            $images = $request->file('images');
            $imageName = time() . '.' . $images->getClientOriginalExtension();
            $images->move(public_path('images'), $imageName);
            $images = 'images/' . $imageName;

            // Tạo bản ghi mới trong cơ sở dữ liệu
            $product = new AdminProduct();
            $product->name = $request->input('name') ;
            $product->description = $request->input('description');
            $product->category = $request->input('category');
            $product->amount = $request->input('amount');
            $product->status = $request->input('status')  ? 1 : 0;
            $product->price = $request->input('price');
            $product->images = $images ;
            $product->save();
            
        // Flash tinnhắn thành công
        $request->session()->flash('success', 'Sản phẩm đã được thêm mới thành công!');
        $request->session()->flash('error', 'Sản phẩm đã được thêm mới thất bại!');
        return redirect('/views/admin/pages/product/list');
    }

    public function edit($id) {
        $product = AdminProduct::findOrFail($id);
        return view('admin.pages.product.edit', compact('product'));
    }

    public function editProduct($id){
        $product = AdminProduct::findOrFail($id);
        if ($product) {
            return view('admin.pages.product.edit', compact('product'));
        } else {
            return redirect('admin/pages/product/edit')->with('error', 'Không tìm thấy bài viết.');
        }
    }
    
    
    public function updateProduct(Request $request, $id)
    {
        // Tìm sản phẩm cần cập nhật
        $product = AdminProduct::findOrFail($id);
    
        // Validate dữ liệu đầu vào từ form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
    
        // Cập nhật thông tin sản phẩm từ dữ liệu form
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];
        $product->save();
    
        // Lưu thông báo thành công vào session
        $request->session()->flash('success', 'Cập nhật sản phẩm thành công!');
    
        // Chuyển hướng về trang danh sách sản phẩm
        return redirect()->route('admin.product.list');
    }
    


    public function delete($id)
    {
        // Tìm sản phẩm trong cơ sở dữ liệu
        $product = AdminProduct::find($id);

        // Kiểm tra xem sản phẩm có tồn tại không
        if (!$product) {
            // Nếu không tìm thấy sản phẩm, trả về thông báo lỗi
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }

        // Xóa sản phẩm
        $product->delete();

        // Trả về thông báo thành công
        return response()->json(['message' => 'Sản phẩm đã được xóa thành công'], 200);
    }
}
