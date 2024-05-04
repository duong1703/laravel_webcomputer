@extends('admin.main')


@section('content')

<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Sản phẩm / Chỉnh sửa</h1>
        <div class="row">
            <div class="col-xl-12">
                <div class="card easion-card rounded-4">
                    <div class="card-header rounded-4">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thông tin sản phẩm </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Tên sản phẩm</label>
                                    <input value="{{ $product->name }}" name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status_product">Trạng thái sản phẩm nổi bật</label>
                                    <select name="status_product" class="form-control" required>
                                        <option value="0" >Ẩn sản phẩm</option>
                                        <option value="1" >Hiển thị</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Giá</label>
                                    <input value="{{ $product->price }}" name="price" type="text" class="form-control" placeholder="Nhập giá bán sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description">Description</label></br>
                                    <textarea name="description" id="description">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Danh mục</label>
                                    <select value="{{ $product->cattegory }}" name="category" class="form-control" id="category"
                                            required>
                                        <option>Nhập danh mục sản phẩm</option>
                                        <option>MÀN HÌNH</option>
                                        <option>THÙNG MÁY</option>
                                        <option>CHIP</option>
                                        <option>RAM</option>
                                        <option>SSD</option>
                                        <option>HDD</option>
                                        <option>CARD ĐỒ HỌA</option>
                                        <option>CHUỘT</option>
                                        <option>BÀN, GHẾ GAMING</option>
                                        <option>QUẠT TẢN NHIỆT</option>
                                        <option>TAI NGHE</option>
                                        <option>TABLET</option>
                                        <option>BÀN PHÍM</option>
                                        <option>LOA</option>
                                        <option>LAPTOP</option>
                                        <option>IPAD</option>
                                        <option>BALO MÁY TÍNH</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Số lượng</label>
                                    <input value="{{ $product->amount }}" name="amount" type="text" class="form-control" placeholder="Nhập số lượng" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-4">Cập nhật</button>
                            <button id="btn-reset-edit-product" type="reset" class="btn btn-secondary rounded-4" onclick="return confirm('Are you sure you want to reset?')">Reset</button>
                                <a style="background-color: red" href="" class="btn btn-secondary rounded-4">Hủy</a>
                                <a style="background-color: yellow" href="" class="btn btn-warning rounded-4 ">Quay lại</a>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>

@endsection
