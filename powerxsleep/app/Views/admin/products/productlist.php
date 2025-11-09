<div class="d-md-flex align-items-center">
    <div>
        <h4 class="card-title">Sản phẩm</h4>
    </div>
    <div class="ms-auto mt-3 mt-md-0">
    <a class="px-0" href="/product/create"><span class="badge bg-info">
        Thêm sản phẩm mới
        </span></a>
    </div>
</div>
                  
<div class="table-responsive mt-4">
    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
        <thead>
            <tr>
                <th scope="col" class="px-0 text-muted">Thumbnail</th>
                <th scope="col" class="px-0 text-muted">Tên sản phẩm</th>
                <th scope="col" class="px-0 text-muted">Phân loại</th>
                <th scope="col" class="px-0 text-muted">Giá</th>                
                <th scope="col" class="px-0 text-muted">Tồn kho</th>
                <th scope="col" class="px-0 text-muted">Trạng thái</th>
                <th scope="col" class="px-0 text-muted">Ngôn ngữ</th>
                <th scope="col" class="px-0 text-muted"></th>
                <th scope="col" class="px-0 text-muted"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <?php
                $language = "Việt";
                $type = "Gối";
                $status = "Ẩn";
                if($product['type'] == "nem")
                    $type = "Nệm";
                if($product['language'] == "en")
                    $language = "Anh";
                if($product['status'])
                    $status = "Hiển thị";
                ?>
                <tr>
                    <td class="px-0"><img style="width : 150px;height: 100px" src="<?= $product['thumbnail'] ?>"></td>
                    <td class="px-0">
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bolder"><?= $product['name'] ?></h6>
                                <span class="text-muted"><?= $product['sku'] ?></span>
                            </div>
                        </div>
                    </td>
                    <td class="px-0"><?= $type ?></td>
                    <td class="px-0"><?= number_format($product['price']) ?> VND</td>
                    <td class="px-0"><?= $product['stock_quantity'] ?></td>
                    <td class="px-0"><?= $status ?></td>
                    <td class="px-0"><?= $language ?></td>
                    <td class="px-0"><a href="/product/edit/<?= $product['id'] ?>">✏️ Cập nhật</a></td>
                    <td class="px-0">
                        <a href="/product/delete/<?= $product['id'] ?>" onclick="return confirm('Xóa sản phẩm?')">🗑️ Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
