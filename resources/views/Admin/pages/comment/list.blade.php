@extends('admin.main')


@section('content')

<div class="dash-content">
    <h1 class="dash-title">Trang chủ / Đánh giá</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card easion-card rounded-4">
                <div class="card-header rounded-4">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách đánh giá</div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="cell-border stripe">
                        @csrf
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID Sản phẩm</th>
                            <th scope="col">Tên người dùng</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mội dung</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                        </thead>
                        <tbody>
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>

@endsection
