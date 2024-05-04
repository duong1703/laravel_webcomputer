<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function listUser(){
        $adminuser = DB::table('adminuser')->get();
        return view('admin/pages/user/list', ['adminuser' => $adminuser]);
    }

    public function addUser(Request $request)
    {
       return view('admin/pages/user/add');
       
    }

    public function create(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:adminuser,email',
            'password' => 'required|string|min:8',
        ]);

        // Hash password
        $hashedPassword = bcrypt($request->input('password'));

        // Create new AdminUser instance
        $adminuser = new adminuser();
        $adminuser->name = $request->input('name');
        $adminuser->email = $request->input('email');
        $adminuser->password = $hashedPassword;
        $adminuser->save();
        $request->session()->flash('success', 'Admin đã được thêm mới thành công!');
        $request->session()->flash('error', 'Admin đã được thêm mới thất bại!');

        // Redirect user after processing the request
        return redirect('/views/admin/pages/user/list'); 
    }

    public function editUser($id){
        $adminuser = adminuser::findOrFail($id);
        return view('admin/pages/user/edit', compact('adminuser'));
    }

    public function delete($id)
    {
        // Tìm sản phẩm trong cơ sở dữ liệu
        $adminuser = adminuser::find($id);

        // Kiểm tra xem sản phẩm có tồn tại không
        if (!$adminuser) {
            // Nếu không tìm thấy sản phẩm, trả về thông báo lỗi
            return response()->json(['message' => 'Không tìm thấy admin'], 404);
        }

        // Xóa sản phẩm
        $adminuser->delete();

        // Trả về thông báo thành công
        return response()->json(['message' => 'Admin phụ đã được xóa thành công'], 200);
    }

    public function update(Request $request, $id)
    {
    // Validate dữ liệu đầu vào
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
    ]);
    try{
    // Tìm người dùng cần cập nhật thông tin
    $adminuser = AdminUser::findOrFail($id);
    $status = $request->input('status');

    // Cập nhật thông tin người dùng
    $adminuser->name = $request->input('name');
    $adminuser->email = $request->input('email');
    $adminuser->status = $status;
    $adminuser->password = $request->input('password');
    // Gán các trường khác nếu cần
    $adminuser->save();

    // Trả về chuyển hướng người dùng về trang danh sách người dùng với thông báo thành công
    return view('admin/pages/user/list', ['adminuser' => $adminuser])->with('success', 'Thông tin người dùng đã được cập nhật thành công');
} catch (\Exception $e) {
    // Nếu có lỗi xảy ra, trả về chuyển hướng người dùng về trang cập nhật với thông báo lỗi
    return view('admin/pages/user/edit', ['adminuser' => $adminuser])->withError('error', 'Có lỗi xảy ra khi cập nhật thông tin người dùng');
}
    
    }
}