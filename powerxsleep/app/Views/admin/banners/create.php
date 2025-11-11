<div class="container mt-4">
    <h3>Thêm Banner mới</h3>

    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('/banners/store') ?>" method="post">
        <div class="mb-3">
            <label for="image_path" class="form-label">Đường dẫn hình ảnh</label>
            <input style="width: 600px;" type="text" class="form-control" name="image_path" id="image_path" value="<?= old('image_path') ?>" required>
            
            <button type="button" id="btnSelect" class="btn btn-success">Chọn ảnh</button>
        </div>

        <div class="mb-3">
            <label for="color_text" class="form-label">Color text</label>
            <input type="text" class="form-control" name="color_text" id="color_text" value="" required>
        </div>

        <div class="mb-3">
            <label for="big_text" class="form-label">Big text</label>
            <input type="text" class="form-control" name="big_text" id="big_text" value="" required>
        </div>

        <div class="mb-3">
            <label for="description_text" class="form-label">Description text</label>
            <input type="text" class="form-control" name="description_text" id="description_text" value="" required>
        </div>

        <div class="mb-3">
            <label for="xem_them_text" class="form-label">View more text</label>
            <input type="text" class="form-control" name="xem_them_text" id="xem_them_text" value="" required>
        </div>

        <div class="mb-3">
            <label for="xem_them_link" class="form-label">View more link</label>
            <input type="text" class="form-control" name="xem_them_link" id="xem_them_link" value="" required>
        </div>

        <div class="mb-3">
            <label for="video_text" class="form-label">Video text</label>
            <input type="text" class="form-control" name="video_text" id="video_text" value="" required>
        </div>

        <div class="mb-3">
            <label for="video_link" class="form-label">Video link</label>
            <input type="text" class="form-control" name="video_link" id="video_link" value="" required>
        </div>

        <div class="mb-3">
            <label for="sort_order" class="form-label">Thứ tự</label>
            <input type="number" class="form-control" name="sort_order" id="sort_order" value="<?= old('sort_order') ?? 0 ?>" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" id="status" class="form-select">
                <option value="1" <?= old('status') == 1 ? 'selected' : '' ?>>Hiện</option>
                <option value="0" <?= old('status') == 0 ? 'selected' : '' ?>>Ẩn</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="<?= base_url('/banners') ?>" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<!-- Nhúng script FLMngr -->
<script src="https://unpkg.com/flmngr"></script>
<script>
    document.getElementById("btnSelect").addEventListener("click", function() {
        Flmngr.open({
            apiKey: "VnZvo5aFGGGWCQ895iY8p8ZB", // default free key
            isMultiple: false,   // chỉ chọn 1 file
            acceptExtensions: ["jpg","jpeg","png","gif","webp"], // chỉ cho chọn ảnh
            urlFileManager: '<?= base_url('filemanager') ?>',
                urlFiles: '<?= session()->get('urlFiles'); ?>',
            onFinish: function(files) {
                if (files && files.length > 0) {
                    // files[0].url là đường dẫn tuyệt đối (hoặc theo config FLMngr)
                    // document.getElementById("image_path").value = files[0].url;

                    let fullUrl = files[0].url;

                    // Bỏ domain
                    let relativeUrl = fullUrl.replace(window.location.origin, '');

                    // Bỏ dấu "/" đầu tiên nếu có
                    if (relativeUrl.startsWith('/')) {
                        relativeUrl = relativeUrl.substring(1);
                    }

                    document.getElementById("image_path").value = relativeUrl;
                }
            }
        });
    });
</script>
