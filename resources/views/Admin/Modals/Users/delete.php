<form action="<?= base_url('admin/user/delete') ?>" method="post">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
    <div class="modal fade" id="confirmDeleteUser" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteUser" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa người dùng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn muốn xóa người dùng này?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="user_id_delete">
                    <a style="background-color: red" href="<?= base_url('admin/user/list') ?>" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                </div>
            </div>
        </div>
    </div>
</form>

