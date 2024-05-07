<form action="<?= base_url('admin/reviews/delete') ?>" method="post">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <div class="modal fade" id="confirmDeleteComment" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteComment" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa đánh giá</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn đánh giá này?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_comment" class="comment_id_delete">
                    <a style="background-color: red" href="<?= base_url('admin/reviews/list') ?>" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                </div>
            </div>
        </div>
    </div>
</form>
