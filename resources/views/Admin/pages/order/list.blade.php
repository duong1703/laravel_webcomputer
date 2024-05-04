@extends('admin.main')


@section('content')

<div class="dash-content">
    <h1 class="dash-title">Trang chủ /Đơn hàng</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card easion-card rounded-4">
                <div class="card-header rounded-4">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách đơn hàng</div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Người mua</th>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Trạng thái đơn hàng</th>
                            <th scope="col">Ngày mua</th>
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