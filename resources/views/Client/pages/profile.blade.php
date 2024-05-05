@include('client.layout.header')

<style>
    /* Định dạng background xám */
    .gray-background {
        background-color: #f8f9fa; /* Màu xám nhạt */
        padding-left: 15px; /* Thụt lề bên trái */
        padding-right: 15px; /* Thụt lề bên phải */
        margin-bottom: 50px;
    }
</style>
<div class="container gray-background mb-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <h1>Thông tin người dùng</h1>
                    <h5>ID người dùng: {{ session()->get("customer_id") }}</h5>
                    <hr>
                    <h5>Tên người dùng: {{ session()->get("customer_name") }}</h5>
                    <hr>
                    <h5>Email: {{ session()->get("customer_email") }}</h5>
                    <hr>
                    <h5>Ngày tạo: {{ session()->get("created_date") }}</h5>
                    <hr>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="orderinfo">
                    <h4>Thông tin lịch sử mua hàng</h4>
                </div>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu" >
                        <th class="id_product">ID</th>
                        <th class="images">Ảnh sản phẩm</th>
                        <th class="name">Tên sản phẩm</th>
                        <th class="price">Giá</th>
                        <th class="quantity">Số lượng</th>
                        <th class="subtotal">Tổng</th>
                        <th class="status">Trạng thái đơn hàng</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@include('client.layout.footer')
