@extends('admin.main')


@section('content')


<main class="dash-content">
    <div class="container-fluid">
        <h1 class="dash-title">Trang chủ / Bài viết / Chỉnh sửa</h1>
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
                    <form action="/views/admin/pages/blogs/edit/{{ $blogs->id }}" method="post">
                            @csrf
                            @method('PUT')
                          
                            <div class="form-group">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $blogs->title }}">
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung:</label>
                                <textarea class="form-control" id="content"
                                    name="content">{{ $blogs->content }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success rounded-4">Cập nhật</button>
                            <a style="background-color: red" href="/views/admin/pages/blogs/list" class="btn btn-secondary rounded-4">Hủy</a>
                            <button id="btn-reset-edit-blog" type="reset" class="btn btn-secondary rounded-4"
                                onclick="return confirm('Are you sure you want to reset?')">Reset</button>
                            <a style="background-color: yellow" href="/views/admin/pages/blogs/list"
                                class="btn btn-warning rounded-4">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
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