@extends('admin.main')


@section('content')

<div class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Bài viết / Thêm</h1>
        <div class="row">
            <div class="col-xl-12">
                <div class="card easion-card rounded-4">
                    <div class="card-header rounded-4">
                        <div class="easion-card-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div class="easion-card-title"> Thông tin bài viết </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            @endforeach
                        </div>
                        @endif
                        <form action="{{ route('blog.create') }}" enctype="multipart/form-data" method="post">
                            <!-- Add CSRF token for security -->
                            @csrf
                            <div>
                                <label>Tiêu đề:</label>
                                <input type="text" name="title" placeholder="Tiêu đề">
                            </div>
                            <div style="padding-top: 20px">
                                <label for="images">Ảnh bài viết</label>
                                <input name="images" type="file" accept="image/*" class="form-control-file" id="images"
                                    required>
                                <div class="form-group">
                                    <img id="img-show" src="{{ asset('images/') }}" class="img-fluid" alt="Hình đại diện."
                                        style="display: none; height: 80px; width: 80px;">
                                </div>
                            </div>
                            <div style="padding-top: 20px">
                                <label>Nội dung</label>
                                <textarea name="content" id="content">Welcome to TinyMCE!</textarea>
                            </div>
                            <button type="submit" class="btn btn-success mt-4 rounded-4 ">Đăng bài</button>
                            <button style="background-color: yellow" href="/views/admin/pages/blogs/list"
                                class="btn btn-warning  rounded-4 mt-4">Quay lại</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/hbozepm8v83oquejurp97p1x4p1eymqxvifr4r4izmvfi34i/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>

<!-- Place the following <script> tag in your HTML's <body> -->
<script>
tinymce.init({
    selector: 'textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [{
            value: 'First.Name',
            title: 'First Name'
        },
        {
            value: 'Email',
            title: 'Email'
        },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
        "See docs to implement AI Assistant")),
});
</script>

<!-- JavaScript for file input preview -->
<script>
document.getElementById('images').addEventListener('change', function(event) {
    var input = event.target;
    var img = document.getElementById('img-show');
    img.style.display = 'block';

    var reader = new FileReader();
    reader.onload = function() {
        img.src = reader.result;
    };

    reader.readAsDataURL(input.files[0]);
});
</script>


<script>
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>

@endsection