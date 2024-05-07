@extends('client.main')

@section('content')
<style>

        swiper-container {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        swiper-slide {
            background-position: center;
            background-size: cover;
            width: 300px;
            height: 300px;
        }

        swiper-slide img {
            display: block;
            width: 100%;
        }
    </style>
<div class="row">
    <h2 class="title text-center">Sản phẩm nổi bật</h2>
    @foreach($data as $index => $product)
        <div class="col-sm-4">
            <div class="features_items">
                <!--features_items-->
                
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ asset($product->images) }}" alt="" />
                            <h2>{{ $product->price }} VND </h2>
                            <p>{{ $product->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2> {{ number_format($product->price)  }} VND</h2>
                                <p>{{ $product->name }}</p>
                                <a href="{{ route('add_to_cart', $product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="/views/client/pages/product_detail/{{ $product->id }}"><i class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if(($index + 1) % 3 == 0)
            </div><div class="row"> <!-- Đóng hàng và bắt đầu hàng mới sau mỗi 3 sản phẩm -->
        @endif
    @endforeach
</div>

<div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">Đối tác của chúng tôi</h2>
                </div>
                <swiper-container class="mySwiper" pagination="true" effect="coverflow" grab-cursor="true"
                                  centered-slides="true"
                                  slides-per-view="auto" coverflow-effect-rotate="50" coverflow-effect-stretch="0"
                                  coverflow-effect-depth="100"
                                  coverflow-effect-modifier="1" coverflow-effect-slide-shadows="true">
                    <swiper-slide>
                        <img src=" {{ asset('images/applelogo.png ') }}"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src=" {{ asset('images/asuslogo.png') }}"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src=" {{ asset('images/NVIDIAlogo.png ') }}"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src=" {{ asset('images/corsairlogo.png ') }} "/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="{{ asset('images/delllogo.png') }}"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="{{ asset('images/hplogo.png ') }}"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="{{ asset('images/intellogo.png') }}"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src=" {{ asset('images/VIEWSONIClogo.png') }}"/>
                    </swiper-slide>
                    <swiper-slide>
                        <img src="{{ asset('images/razerlogo.png') }}"/>
                    </swiper-slide>
            </div>

        </div>

    </div> 



@endsection