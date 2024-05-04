@include('client.layout.header')
<section class="vh-100 mt-4">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 mb-4">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center mb-4">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng ký tài khoản</p>

                                <form class="mx-1 mx-md-4 mt-4" action="{{ route('customer.register') }}" method="post">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label" for="customer_name">Họ và tên</label>
                                        <input type="text" name="name" value="" id="customer_name" class="form-control"
                                            placeholder="Nhập họ và tên của bạn" />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="customer_email">Email của bạn</label>
                                        <input type="email" name="email" value="" id="customer_email"
                                            class="form-control" placeholder="Nhập địa chỉ email của bạn" />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="customer_password">Mật khẩu</label>
                                        <input type="password" name="password" value="" id="customer_password"
                                            class="form-control" placeholder="Nhập mật khẩu" />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="confirm_password">Xác nhận mật khẩu</label>
                                        <input type="password" name="password_confirmation" value=""
                                            id="confirm_password" class="form-control"
                                            placeholder="Nhập lại mật khẩu" />
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                                </form>

                                <hr>
                                <div>
                                    <label class="text-center mt-4">Đã có tài khoản:</label><a href="login">Đăng
                                        nhập</a>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img width="800" height="500"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                    class="img-fluid" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


@include('client.layout.footer')