<footer id="footer">
    <!--Footer-->
    <div class="footer-top">
        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <img src="{{ asset('images/logo.png') }}" alt="" width="180" height="90" class="img-responsive" /></a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="flex-container">
                        <a href="#">
                            <img style="margin-top: 50px; margin-left 50px: " src="{{ asset('images/logoepu.png') }}"
                                class="img-responsive" alt="Company Logo" height="100px" width="100px">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Dịch vụ</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Trợ giúp trực tuyến</a></li>
                            <li><a href="#">Liên hệ chúng tôi</a></li>
                            <li><a href="#">Đặt hàng</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Danh mục</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="">Máy tính Laptop</a></li>
                            <li><a href="">Thùng máy</a></li>
                            <li><a href="">Card đồ họa</a></li>
                            <li><a href="">Chuột</a></li>
                            <li><a href="">Bàn phím</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Chính sách</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Chính sách sử dụng</a></li>
                            <li><a href="#">Chính sách ưu đãi</a></li>
                            <li><a href="#">Chính sách mua hàng</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Về cửa hàng</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="views/intro">Giới thiệu</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Đăng ký nhận tin</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="btn btn-default"><i
                                    class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Đăng ký nhận tin để nhận những thông tin mới nhất về chúng tôi...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2024 The Computer Shop Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="">The Computer Shop</a></span></p>
            </div>
        </div>
    </div>

</footer>
<!--/Footer-->
<script src="{{ asset('js/jquery.js') }} "></script>
<script src="{{ asset('js/bootstrap.min.js') }} "></script>
<script src=" {{ asset('js/jquery.scrollUp.min.js') }} "></script>
<script src=" {{ asset('js/price-range.js') }} "></script>
<script src=" {{ asset('js/jquery.prettyPhoto.js') }} "></script>
<script src=" {{ asset('js/main.js') }} "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script async src="https://cse.google.com/cse.js?cx=76d01f3bea7db4066"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>



function AddCart(id) {
    $.ajax({
        url: '/Add-Cart/' + id,
        type: 'GET',

    }).done(function(response) {
        console.log(response);
        $("#cart_items").empty();
        $("#cart_items").html(response);

        // Hiển thị thông báo thêm sản phẩm thành công
        $("#cart-notification").fadeIn().delay(3000).fadeOut();
    });
}
</script>
</html>