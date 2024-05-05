@extends('admin.main')


@section('content')
<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Tài khoản / Sửa</h1>
        <div class="row">
            <div class="col-xl-12">
                <div class="card easion-card rounded-4">
                    <div class="card-header rounded-4">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thông tin tài khoản </div>
                    </div>
                    <div class="card-body ">
                        <div id="edit-alerts">
                            @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->all() as $error)
                                {{ $error }}
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <form action="/views/admin/pages/product/edit/{{ $adminuser->id }}" method="post">
                        @csrf
                            @method('PUT')
                            <input name="id" value="" hidden>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Email</label>
                                    <input name="email" type="email" value="{{ $adminuser->email }}"
                                        class="form-control" id="inputEmail4" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Tên hiển thị</label>
                                <input name="name" type="text" value="{{ $adminuser->name }}" class="form-control"
                                    id="inputAddress" placeholder="Tên hiển thị người dùng" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Trạng thái users</label>
                                <select name="status" class="form-control" required>
                                    <option value="1" <?php  ?>>Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Mật khẩu</label>
                                    <input name="password" type="password" class="form-control" id="password"
                                        placeholder="Nhập vào mật khẩu" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password-confirm">Xác nhận mật khẩu</label>
                                    <input name="password_confirm" type="password" class="form-control"
                                        id="password-confirm" placeholder="Xác nhận lại mật khẩu" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input name="change_password" type="checkbox" class="custom-control-input"
                                        id="change-password">
                                    <label class="custom-control-label" for="change-password">Thay đổi mật
                                        khẩu</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-4">Cập nhật</button>
                            <button id="btn-reset-edit-user" type="reset" class="btn btn-secondary rounded-4">Nhập
                                lại</button>
                            <a style="background-color: yellow" href="/views/admin/pages/user/list"
                                class="btn btn-warning rounded-4 ">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>

@endsection