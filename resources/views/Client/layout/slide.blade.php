<style>

    swiper-container {
        width: 100%;
        height: 100%;
    }

    .slider {
        width: 100%;
        height: 100%;
    }

    .swiperslide {
        text-align: center;
        font-size: 18px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<body>
<swiper-container id="slider" class="mySwiper" navigation="true">
    <swiper-slide class="slider">
        <img id="imagesslide" src=" {{ asset('images/banner1.jpg') }}" alt="" class="img-responsive">
    </swiper-slide>
    <swiper-slide>
        <img src="{{ asset('images/banner2.png') }}" alt="" class="img-responsive">
    </swiper-slide>
    <swiper-slide>
        <img src="{{ asset('images/banner3.jpg') }}" alt="" class="img-responsive">
    </swiper-slide>
</swiper-container>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

</body>