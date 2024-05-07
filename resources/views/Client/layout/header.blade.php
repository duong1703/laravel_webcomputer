<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ</title>
    <link href="{{ asset('css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }} " rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }} " rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }} " rel="stylesheet">
    <link href=" {{ asset('css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"
        integrity="sha512-xnwMSDv7Nv5JmXb48gKD5ExVOnXAbNpBWVAXTo9BJWRJRygG8nwQI81o5bYe8myc9kiEF/qhMGPjkSsF06hyHA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css"
        integrity="sha512-PIAUVU8u1vAd0Sz1sS1bFE5F1YjGqm/scQJ+VIUJL9kNa8jtAWFUDMu5vynXPDprRRBqHrE8KKEsjA7z22J1FA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->
<header id="header">
    <!--header-->
    <div class="header_top">
        <!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> 0812453363</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> dduong1703@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/DuongDinh1703"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header_top-->

    <div class="header-middle">
        <!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/views/client/pages/home"><img src="{{ asset('images/logo.png') }}" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        @if(Auth::check())
                        <!-- Hiển thị khi người dùng đã đăng nhập -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i> {{ Auth::user()->name}} </a>
                            </li>
                            <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                            <li><a href="{{ route('viewcart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng <span
                                        class="badge badge badge-info">{{ count((array) session('cart')) }}</span></a>
                            </li>
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="fa fa-sign-out"></i> Đăng xuất</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                        @else
                        <!-- Hiển thị khi người dùng chưa đăng nhập -->
                        <ul class="nav navbar-nav">
                            <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                            <li><a href="{{ route('viewcart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng <span
                                        class="badge badge badge-info">{{ count((array) session('cart')) }}</span></a>
                            </li>
                            <li><a href="{{ route('login-user') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                        </ul>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/header-middle-->

    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/views/client/pages/home" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/views/client/pages/product">Sản phẩm</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Bài viết<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/views/client/pages/blogs">Danh sách</a></li>
                                </ul>
                            </li>
                            <li><a href="/views/client/pages/intro">Giới thiệu</a></li>
                            <li><a href="/views/client/pages/contact">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Search" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
</header>