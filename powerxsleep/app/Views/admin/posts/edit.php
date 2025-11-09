<form method="post" action="<?= base_url('/post/update/'.$post['id']) ?>">
    <div class="mb-3">
        <label class="form-label">Tiêu đề</label>
        <input type="text" class="form-control"  name="title" value="<?= esc($post['title']) ?>" required>
    </div>
    <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <table style="width: 100%">
                <tr>
                    <td><input type="text" id="thumbnail" name="thumbnail" class="form-control" value="<?= esc($post['thumbnail']) ?>" required></td>
                    <td>&nbsp;&nbsp;<button type="button" id="btn_thumbnail" class="btn btn-success">Chọn ảnh</button></td>
                </tr>
            </table>
        </div>
    <div class="mb-3">
    <label class="form-label">Trạng thái</label>
        <select class="form-select" name="status">
            <option value="draft" <?= $post['status'] == 'draft' ? 'selected' : '' ?>>Nháp</option>
            <option value="published" <?= $post['status'] == 'published' ? 'selected' : '' ?>>Xuất bản</option>
        </select>
    </div>
    <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control"><?= esc($post['description']) ?></textarea>
        </div>
    <div class="mb-3">
        <label class="form-label">Nội dung</label>
        <textarea id="post_content" name="post_content"><?= esc($post['content']) ?></textarea>
    </div>    
    
    <button type="submit" class="btn btn-primary">Save</button>


    
</form>



<script src="<?= base_url('tinymce/tinymce.min.js') ?>"></script>
<script>
	tinymce.init({
		selector: '#post_content',
		plugins: "file-manager,link,image",
		toolbar: "link | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent",        
		Flmngr: {
			apiKey: "VnZvo5aFGGGWCQ895iY8p8ZB", // default free key
            isMultiple: false,
			urlFileManager: '<?= base_url('filemanager') ?>',
            urlFiles: '<?= session()->get('urlFiles'); ?>',
		},
		promotion: false,
	});
</script>


<!-- Nhúng script FLMngr -->
<script src="https://unpkg.com/flmngr"></script>
<script>
  document.getElementById("btn_thumbnail").addEventListener("click", function() {
    Flmngr.open({
        apiKey: "VnZvo5aFGGGWCQ895iY8p8ZB", // default free key
      isMultiple: false,   // chỉ chọn 1 file
      acceptExtensions: ["jpg","jpeg","png","gif","webp"], // chỉ cho chọn ảnh
      urlFileManager: '<?= base_url('filemanager') ?>',
            urlFiles: '<?= session()->get('urlFiles'); ?>',
      onFinish: function(files) {
        if (files && files.length > 0) {
          // files[0].url là đường dẫn tuyệt đối (hoặc theo config FLMngr)
          let fullUrl = files[0].url;

        // Bỏ domain
        let relativeUrl = fullUrl.replace(window.location.origin, '');

        // Bỏ dấu "/" đầu tiên nếu có
        if (relativeUrl.startsWith('/')) {
            relativeUrl = relativeUrl.substring(1);
        }

        document.getElementById("thumbnail").value = relativeUrl;
        }
      }
    });
  });
</script>