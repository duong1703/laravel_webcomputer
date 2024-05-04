@include('client.layout.header')

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Tin công nghệ mới nhất</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-post-area" style="padding-bottom: 20px">
                    <div class="single-blog-post">

                        <h3 style="color: orange"></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i>{{ session('name') }}</li>
                                <li><i class="fa fa-clock-o"></i></li>
                            </ul>
                        </div>


                        <img src="" alt="" height="60px" width="60px" style="margin-top: 20px">
                        <p>
                        {{  $blog->images}}
                        <div class="hidden-content" style="display: none;">
                        </div>

                        </p>
                        <a class="btn btn-primary" href="blog_single">Xem
                            thêm</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
    </div>
</div>
</div>

@include('client.layout.footer')