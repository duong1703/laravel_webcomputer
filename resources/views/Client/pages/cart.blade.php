@include('client.layout.header')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="table-responsive cart_info">
            <table class="table table-condensed text-center">
                <thead>
                    <tr class="cart_menu">
                        <td class="id">ID</td>
                        <td class="image">Ảnh</td>
                        <td class="name">Tên</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="delete">Hành động</td>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                    <tr>
                        @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        <td>
                            <p>{{ $details['id']}}</p>
                        </td>
                        <td>
                            @if(isset($details['images']))
                            <img src="{{ asset($details['images']) }} " style="width:120px; height:120px;">
                            @endif


                        </td>
                        <td>
                            <h5>{{ $details['name']   }}</h5>
                            <p>Mã sản phẩm: {{ $details['id']}} </p>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($details['price'])}} VND</p>
                        </td>
                        <td>
                            <span class="count"> {{ $details['quantity']}}</span>
                        </td>
                        <td class="actions" data-th="" style="margin-top:25px;">

                            <form action="{{ route('cart.remove', ['itemId' => $details['id']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="" type="submit">Xóa khỏi giỏ hàng</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->



<section id="do_action">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng tiền <span> {{ number_format($total) }} VND</span></li>
                    </ul>

                    <form action="{{ url('/vnpay_payment') }}" method="post">
                        @csrf
                        <input name="total" type="hidden" value="{{ $total }}">
                        <button type="submit" name="redirect" class="btn btn-default check_out mt-2">Thanh toán
                            VNPAY</button>
                    </form>
                    <a class="btn btn-default check_out" href="{{ route('listproduct') }}">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
// Add event listener to delete icon
document.querySelectorAll('.cart_quantity_delete').forEach(function(element) {
    element.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior

        // Find the parent row and remove it
        var row = element.closest('tr');
        row.remove();

        // Alternatively, you can send an AJAX request to delete the item from the server
        // and then remove the row upon successful deletion
    });
});
</script>


@include('client.layout.footer')