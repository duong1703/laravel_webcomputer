@include('client.layout.header')

<div class="container mt-5">
    <div class="row">

        <div class="col-md-6">
            <h2>Thông tin đơn hàng</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>

                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>{{ $details['name']}}</td>
                        <td>{{ $details['quantity']}}</td>
                        <td>{{ $details['price']}}</td>

                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <h2>Nhập thông tin thanh toán</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter your address">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter your phone number">
                </div>
            </form>
           
        </div>
    </div>
</div>
@include('client.layout.footer')    