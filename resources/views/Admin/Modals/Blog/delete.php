<form action="{{ route('deleteBlog', ['id' => '']) }}" method="delete" id="deleteBlogForm">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal fade" id="confirmDeleteBlogs" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteBlogs" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa bài viết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa bài viết này?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="blogs_id_delete">
                    <a style="background-color: red" href="/views/admin/pages/blogs/list" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                </div>
            </div>
        </div>
    </div>
</form>
