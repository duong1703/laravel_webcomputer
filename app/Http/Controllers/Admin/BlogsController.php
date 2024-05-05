<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AdminBlogs;
use DB;

class BlogsController extends Controller
{
    public function listBlogs(){
        $blog = DB::table('blogs_models')->get();
        return view('admin/pages/blogs/list', ['blog' => $blog]);
    }

    public function addBlogs(){
        return view('admin/pages/blogs/add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // 'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:8000',
        ]);
    
        // Upload ảnh và lưu đường dẫn vào cơ sở dữ liệu
        $images = $request->file('images');
        $imageName = time() . '.' . $images->getClientOriginalExtension();
        $images->move(public_path('images'), $imageName);
        $images = 'images/' . $imageName;
    
        $blogs = new AdminBlogs();
        $blogs->title = $request->input('title');
        $blogs->content = $request->input('content');
        $blogs->images = $images;
        $blogs->save();
    
        // Flash success message
        $request->session()->flash('success', 'Bài viết đã được đăng thành công!');
    


        return redirect('/views/admin/pages/blogs/list')->with('success', 'Bài viết đã được cập nhật thành công.');

    }

    public function updateBlogs(Request $request, $id)
    {
    $post = AdminBlogs::findOrFail($id);
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    // Cập nhật các trường thông tin khác nếu cần
    $post->save();
    return redirect('/views/admin/pages/blogs/list')->with('success', 'Bài viết đã được cập nhật thành công.');
    }


    public function editBlogs($id){
        $blogs = AdminBlogs::findOrFail($id);
        if ($blogs) {
            return view('admin/pages/blogs/edit', compact('blogs'));
        } else {
            // Xử lý trường hợp không tìm thấy bài viết với ID đã cho
            return redirect('admin/pages/blogs/edit')->with('error', 'Không tìm thấy bài viết.');
            // Hoặc hiển thị thông báo lỗi trực tiếp trên trang:
            // return view('error')->with('message', 'Không tìm thấy bài viết với ID đã cho.');
        }
    }

    public function delete($id)
    {
        // Tìm sản phẩm trong cơ sở dữ liệu
        $AdminBlogs = AdminBlogs::find($id);

        // Kiểm tra xem sản phẩm có tồn tại không
        if (!$AdminBlogs) {
            // Nếu không tìm thấy sản phẩm, trả về thông báo lỗi
            return response()->json(['message' => 'Không tìm thấy bài viết'], 404);
        }

        // Xóa sản phẩm
        $AdminBlogs->delete();

        // Trả về thông báo thành công
        return response()->json(['message' => ' Bài viết đã được xóa thành công'], 200);
    }

}
