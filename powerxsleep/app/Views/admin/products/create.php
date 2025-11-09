<h3>Thêm sản phẩm</h3><br>


<form method="post" action="<?= base_url('product/store') ?>">
        <div class="mb-3">
            <label class="form-label">Thumbnail</label>
            <table style="width: 100%">
                <tr>
                    <td><input type="text" id="thumbnail" name="thumbnail" class="form-control" value="" required></td>
                    <td>&nbsp;&nbsp;<button type="button" id="btn_thumbnail" class="btn btn-success">Chọn ảnh</button></td>
                </tr>
            </table>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">SKU</label>
            <input type="text" name="sku" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Thương hiệu</label>
            <select class="form-select"  name="brand_id">
                <?php foreach ($brands as $b): ?>
                    <option value="<?= $b['id'] ?>" >
                        <?= esc($b['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
 

        <div class="mb-3">
            <label class="form-label">Giá sản phẩm</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá khuyến mãi (nếu có)</label>
            <input type="number" name="sale_price" class="form-control" value="">
        </div>

        <div class="mb-3">
            <label class="form-label">Tồn kho</label>
            <input type="number" name="stock_quantity" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label class="form-label">Loại sản phẩm</label>
            <select name="type" class="form-control">
                <option value="goi">Gối</option>
                <option value="nem">Nệm</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Ngôn ngữ</label>
            <select name="language" class="form-control">
                <option value="vi">Tiếng Việt</option>
                <option value="en">Tiếng Anh</option>
            </select>
        </div>
        

        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-control">
                <option value="1">Hiển thị</option>
                <option value="0">Ẩn</option>
            </select>
        </div>

        <div class="mb-3 form-check">
            <label class="form-label">Danh mục bán chạy</label>
            <input name="is_bestseller" type="checkbox" class="form-check-input" id="exampleCheck1">
        </div>

        <div class="mb-3">
            <label class="form-label">Sub Thumbnail</label>
            <table style="width: 100%">
                <?php 
                for ($i = 0; $i < 5; $i++): ?>
                    <tr style="height: 50px;">
                        <td><input type="text" id="subthumbnail<?= $i ?>" name="subthumbnails[]" class="form-control" value=""></td>
                        <td>&nbsp;&nbsp;<button type="button" id="btn_subthum<?= $i ?>" class="btn btn-success">Chọn ảnh</button></td>
                    </tr>
                <?php endfor; ?>
            </table>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả ngắn</label>
            <textarea name="short_description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả dài</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Nội dung sản phẩm</label>
            <textarea id="product_content" name="product_content" class="form-control" rows="5"></textarea>
        </div>
    
    
    <button type="submit" class="btn btn-primary">Add</button>
</form>



<script src="<?= base_url('tinymce/tinymce.min.js') ?>"></script>
<script>
	tinymce.init({
		selector: '#product_content',
		plugins: "file-manager,link,image",
		toolbar: "link | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent",        
		Flmngr: {
			apiKey: "VnZvo5aFGGGWCQ895iY8p8ZB", // default free key
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

  document.getElementById("btn_subthum0").addEventListener("click", function() {
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

        document.getElementById("subthumbnail0").value = relativeUrl;
        }
      }
    });
  });

  document.getElementById("btn_subthum1").addEventListener("click", function() {
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

        document.getElementById("subthumbnail1").value = relativeUrl;
        }
      }
    });
  });

  document.getElementById("btn_subthum2").addEventListener("click", function() {
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

        document.getElementById("subthumbnail2").value = relativeUrl;
        }
      }
    });
  });

  document.getElementById("btn_subthum3").addEventListener("click", function() {
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

        document.getElementById("subthumbnail3").value = relativeUrl;
        }
      }
    });
  });

  document.getElementById("btn_subthum4").addEventListener("click", function() {
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

        document.getElementById("subthumbnail4").value = relativeUrl;
        }
      }
    });
  });
</script>