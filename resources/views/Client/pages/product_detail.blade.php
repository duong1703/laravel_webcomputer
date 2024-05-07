@include('client.layout.header')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục</h2>
                    @foreach($cateproduct as $cate_product)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="#">{{ $cate_product->category }}</a><span class="product-count"> ({{ $cate_product->product_count }})</span></h4>
                        </div>
                    </div>
                    @endforeach
                    <!--/category-products-->
                    <div class="price-range">
                        <!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
                    <div class="col-sm-5">
                        <form action=" " method="POST">
                            @csrf
                            <div class="view-product">

                                <img src="{{ asset($product->images) }}" alt="" />
                            </div>

                    </div>

                    <div class="col-sm-7">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="product-information">
                            <div id="cart-notification" class="alert alert-success text-center" style="display: none; margin-right: 30px">
                                Sản phẩm đã được thêm vào giỏ hàng thành công.
                            </div>
                            <!--/product-information-->
                            <img src="" class="newarrival" alt="" />
                            <h2>{{ $product->name }}</h2>
                            <p>Mã sản phẩm: {{ $product->id }}</p>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
                                <span>{{ ($product->price ) }} VND </span><br>
                                <label>Kho: {{ $product->amount }}</label><br>
                                <input type="number" name="quantity" value="1" min="1"><br>
                                <input type="hidden" name="id" value="{{ $product->id }}"><br>
                                <!-- <button style="margin-top:10px; margin-right:95px" type="submit" name="addToCart" class="btn btn-fefault">
                                    <i class="fa fa-shopping-cart"></i>
                                    Add to cart
                                </button> -->
                                <!-- <a class="btn btn-default add-to-cart" onclick="AddCart({{ $product->id }})"
                                    href="javascript:">Add to cart</a> -->
                                <a  class="btn btn-default add-to-cart" href="{{ route('add_to_cart', $product->id) }}"> Add to cart</a>
                                   
                            </span>
                            <p><b>Kho:</b> Còn hàng</p>
                            <p><b>Tình trạng:</b> Mới</p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"
                                    alt="" /></a>
                        </div>
                        <!--/product-information-->
                        </form>
                    </div>
                </div>
                <!--/product-details-->

                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details">
                            {{ $product->description }}
                        </div>

                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i></a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i></a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i></a></li>
                                </ul>
                                <p><b>Viết đánh giá của bạn</b></p>

                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name" />
                                        <input type="email" placeholder="Email Address" />
                                    </span>
                                    <textarea name=""></textarea>
                                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/category-tab-->

            </div>
        </div>
    </div>
</section>



@include('client.layout.footer')