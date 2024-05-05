@extends('admin.main')


@section('content')
<div class="container-fluid">
    <h1 class="dash-title">Trang chủ / Tài khoản</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card easion-card rounded-4">
                <div class="card-header rounded-4">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách tài khoản</div>
                </div>
                <div class="card-body ">
                    <table id="datatable" class="cell-border stripe">
                        @csrf
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Status</th>
                                <th scope="col">Mật khẩu</th>
                                <th scope="col">Email</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1; // Khởi tạo biến đếm
                            @endphp
                            @foreach ($adminuser as $adminuser)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $adminuser->name }}</td>
                                <td>{{ $adminuser->status }}</td>
                                <td>{{ $adminuser->password }}</td>
                                <td>{{ $adminuser->email }}</td>
                                <td class="text-center">
                                    <a href="/views/admin/pages/user/edit/{{ $adminuser->id }}"
                                        class="btn btn-primary btn-sm ___js-edit-user"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm js-delete-user" data-id="{{ $adminuser->id }}">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>

<script>
    document.querySelectorAll('.js-delete-user').forEach(button => {
        button.addEventListener('click', function() {
            // Hiển thị hộp thoại xác nhận
            if (confirm('Bạn có chắc chắn muốn xóa người dùng này không?')) {
                var productId = this.getAttribute('data-id');
                
                fetch('/delete-user/' + productId, {
                    method: 'DELETE', // Sử dụng phương thức DELETE
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Truyền token CSRF
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        console.error('Error:', response);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
</script>
@endsection