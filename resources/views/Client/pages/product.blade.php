@include('client.layout.header')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh mục sản phẩm</h2>
                    @foreach($cateproduct as $cate_product)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="/views/client/pages/product/category={{ $cate_product->category }}">{{ $cate_product->category }}</a> <span class="product-count">({{ $cate_product->product_count }})</span></h4>
                            
                        </div>
                    </div>
                    @endforeach
                    <!--/category-productsr-->

                    <div class="price-range">
                        <!--price-range-->
                        <h2>Lọc giá</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                                data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>
                    <!--/price-range-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Sản phẩm</h2>
                    <div class="row">
                        @foreach($data as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset($product->images) }}" alt="" />
                                        <h2>{{ $product->price  }} VND </h2>
                                        <p>{{ $product->name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ $product->price  }} VND </h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="/views/client/pages/product_detail/{{ $product->id }}"><i
                                                class="fa fa-plus-square"></i>Chi tiết sản phẩm</a></li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--features_items-->
                {{ $data->links() }}
            </div>

        </div>
    </div>
</section>


@include('client.layout.footer')