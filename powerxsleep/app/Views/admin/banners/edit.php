<div class="container mt-4">
    <h3>Sửa Banner</h3>

    <?php if(session()->getFlashdata('error')): ?>
        <p style="color:red"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="<?= base_url('/banners/update/'.$banner['id']) ?>" method="post">
        <div class="mb-3">
            <label for="image_path" class="form-label">Đường dẫn hình ảnh</label>
            <input style="width: 600px;" type="text" class="form-control" name="image_path" id="image_path" 
                    value="<?= old('image_path', $banner['image_path']) ?>" required>            
            <button type="button" id="btnSelect" class="btn btn-success">Chọn ảnh</button>
        </div>

        

        <div class="mb-3">
            <label for="sort_order" class="form-label">Thứ tự</label>
            <input type="number" class="form-control" name="sort_order" id="sort_order"
                   value="<?= old('sort_order', $banner['sort_order']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select name="status" id="status" class="form-select">
                <option value="1" <?= ($banner['status'] == 1 ? 'selected' : '') ?>>Hiện</option>
                <option value="0" <?= ($banner['status'] == 0 ? 'selected' : '') ?>>Ẩn</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Cập nhật</button>
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
