@extends('admin.main')


@section('content')

<div class="dash-content">
    <h1 class="dash-title">Trang chủ /Bài viết</h1>
    <div class="row">
        <div class="col-lg-12">

            <div class="card easion-card rounded-4">
                <div class="card-header rounded-4">
                    <div class="easion-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="easion-card-title">Danh sách bài viết</div>
                </div>
                <div class="card-body">
                    <table id="datatable" class="cell-border stripe">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ảnh bài viết</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $count = 1; // Khởi tạo biến đếm
                            @endphp
                            @if (isset($blog) && !empty($blog))
                            @foreach ($blog as $blog)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                    <img src="{{ asset($blog->images) }}" height="50px">
                                </td>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    <?php
                                    $maxCharacters = 200; // Số ký tự tối đa muốn hiển thị trước khi cắt
                                    $truncatedContent = Str::limit($blog->content, $maxCharacters, '...'); // Cắt nội dung
                                    $remainingContent = substr($blog->content, $maxCharacters); // Phần còn lại của nội dung

                                    $isTruncated = strlen($blog->content) > $maxCharacters; // Kiểm tra xem nội dung đã bị cắt hay không
                                    ?>
                                    {{ $isTruncated ? $truncatedContent : $blog->content }}
                                    @if ($isTruncated)
                                    <div class="hidden-content" style="display: none;">{{ $remainingContent }}</div>
                                    @endif
                                </td>
                                <td>{{ $blog->created_at }}</td>
                                <td class="text-center">
                                    <a href="/views/admin/pages/blogs/edit/{{ $blog->id }}"
                                        class="btn btn-primary btn-sm "><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm js-delete-blog" data-id="{{ $blog->id }}">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#datatable').DataTable();
});
</script>
<script>
document.querySelectorAll('.js-delete-blog').forEach(button => {
    button.addEventListener('click', function() {

        var productId = this.getAttribute('data-id');


        fetch('/delete-blog/' + productId, {
                method: 'DELETE', // Sử dụng phương thức DELETE
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Truyền token CSRF
                }
            })
            .then(response => {
                if (response.ok) {

                    window.location.reload();
                } else {
                    console.error('Error:', response);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
</script>

@endsection