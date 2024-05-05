@extends('admin.main')


@section('content')

<div class="dash-content">
    <h1 class="dash-title">Trang chủ /Sản phẩm</h1>
    <div class="row">
        <div class="col-lg-12">

            <div class="card easion-card rounded-4">
                <div class="card-header rounded-4">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="row">
                        <div class="">
                            <div class="easion-card-title">Danh sách sản phẩm</div>
                        </div>
                    </div>

                </div>
                <div class="card-body ">
                    <table id="datatable" class="cell-border stripe">
                        @csrf
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Mô tả sản phẩm</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col" class="text-center">Trạng thái sản phẩm nổi bật</th>
                                <th scope="col" style="width: 100px">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1; // Khởi tạo biến đếm
                            @endphp
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $count++ }}</td>
                                
                                <td>{{ $product->name }}</td>
                                
                                <td class="text-center">
                                    <img src="{{ asset($product->images) }}" height="50px">
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td class="text-center">{{ $product->category }}</td>
                                <td class="text-center">{{ $product->amount }}</td>
                                <td class="text-center">{{ $product->status }}</td>
                                <td class="text-center">
                                <a href="/views/admin/pages/product/edit/{{ $product->id }}" class="btn btn-primary btn-sm" onclick="return confirm('Bạn có chắc chắn muốn chỉnh sửa sản phẩm này không?');"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm js-delete-product" data-id="{{ $product->id }}">
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
    document.querySelectorAll('.js-delete-product').forEach(button => {
        button.addEventListener('click', function() {
            // Hiển thị hộp thoại xác nhận
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                var productId = this.getAttribute('data-id');
                
                fetch('/delete-product/' + productId, {
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