<h4>Sửa trang</h4>

<form action="<?= base_url('/pages/update/'.$page['id']) ?>" method="post">
    <div class="mb-3">
        <label for="title">Tiêu đề</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= esc($page['title']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="content">Nội dung</label>
        <textarea class="form-control" name="content" id="content" rows="6"><?= esc($page['content']) ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="<?= base_url('/pages') ?>" class="btn btn-secondary">Hủy</a>
</form>


<script src="<?= base_url('tinymce/tinymce.min.js') ?>"></script>
<script>
	tinymce.init({
		selector: '#content',
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

