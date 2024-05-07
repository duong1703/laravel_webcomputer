@include('client.layout.header')
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Liên hệ <strong>với chúng tôi</strong></h2>
                <div id="gmap" class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.65745090203!2d105.78236867494259!3d21.04638798060735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1708787767048!5m2!1svi!2s"
                        width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Gửi thông tin tới chúng tôi để được hỗ trợ!</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <form action="{{ route('contact.us.store') }}" id="main-contact-form" class="contact-form row"
                        name="contact-form" method="post">
                        @csrf
                        <div class="form-group col-md-6">
                            <input type="text" name="name" class="form-control"  placeholder="Name">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" class="form-control" 
                                placeholder="Email">
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            <input type="number" name="phone" class="form-control" 
                                placeholder="Phone">
                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="subject" class="form-control" 
                                placeholder="Subject">
                            @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="message" id="message" class="form-control" rows="8"
                                placeholder="Your Message Here"></textarea>
                            @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit_contact" class="btn btn-primary pull-right"
                                value="Submit">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Thông tin liên hệ</h2>
                    <address>
                        <p>The Computer Shop</p>
                        <p>235 Hoàng Quốc Việt, Bắc Từ Liêm, Hà Nội</p>
                        <p>Số liên hệ: 08124533636</p>
                        <p>Email: dduong1703@gmail.com</p>
                    </address>
                    <div class="social-networks">
                        <h2 class="title text-center">Mạng xã hội</h2>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/DuongDinh1703/"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/#contact-page-->


@include('client.layout.footer')