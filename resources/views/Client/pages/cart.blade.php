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
                            <img src="{{ asset('images' . $details['image']) }}">
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
                            <button class="btn btn-danger btn-sm cart-remove "
                                 style="margin-left:35px;"><i class="fa fa-trash-o"> </i>
                                Xóa</button>
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
                    <button type="submit" name="redirect" class="btn btn-default check_out">Thanh toán VNPAY</button>
                    </form>
                    <a class="btn btn-default check_out" href="{{ route('listproduct') }}">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(".cart-remove").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if (confirm("Bạn có muốn xóa sản phẩm này không ?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>


@include('client.layout.footer')