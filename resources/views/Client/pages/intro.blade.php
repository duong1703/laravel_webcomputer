@include('client.layout.header')

<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Giới thiệu </h2>
            </div>
                <div class="row g-0 bg-body-secondary position-relative">
                <div class="col-md-6 mb-md-0 p-md-4">
                    <img src="{{ asset('images/intro.png') }}" alt="" height="500" width="550">
                </div>
                <div class="col-md-6 p-4 ps-md-0">
                    <h5 style="font-size: large; font-style: italic; " class="mt-0 text-justify ">Đôi chút về website!</h5>
                    <p style="font-size: large; font-style: italic;" class="">
                        The Computer Shop là một trang web bán hàng chuyên cung cấp các sản phẩm và dịch vụ liên quan đến công nghệ thông tin, máy tính và thiết bị điện tử.<br> Với một môi trường mua sắm trực tuyến đẹp mắt và thân thiện người dùng, The Computer Shop mang đến cho khách hàng một trải nghiệm mua sắm trực tuyến dễ dàng và thuận tiện.

                        Tại The Computer Shop, khách hàng có thể dễ dàng tìm thấy các sản phẩm từ các danh mục đa dạng như máy tính để bàn, laptop, linh kiện máy tính, phụ kiện công nghệ, thiết bị điện tử gia dụng và nhiều hơn nữa.<br> Trang web cung cấp một loạt các sản phẩm từ các thương hiệu hàng đầu, đảm bảo chất lượng và đáng tin cậy.

                        Ngoài ra, The Computer Shop cũng cung cấp các dịch vụ hỗ trợ khách hàng như hướng dẫn mua hàng, chăm sóc sau bán hàng và hỗ trợ kỹ thuật, giúp khách hàng có được trải nghiệm mua sắm tốt nhất và an tâm khi sử dụng sản phẩm.

                        <br>Với cam kết về chất lượng sản phẩm, dịch vụ tận tình và một môi trường mua sắm trực tuyến tiện lợi, The Computer Shop là điểm đến lý tưởng cho những người đam mê công nghệ và muốn tìm kiếm những sản phẩm hàng đầu trên thị trường.
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>


@include('client.layout.footer')
