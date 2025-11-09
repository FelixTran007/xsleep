<div class="d-md-flex align-items-center">
    <div>
        <h4 class="card-title">Danh sách Banner</h4>
    </div>
    <div class="ms-auto mt-3 mt-md-0">
        <?php if(session()->getFlashdata('success')): ?>
            <p style="color: green"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
            <p style="color: red"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        
        <a class="px-0" href="/banners/create"><span class="badge bg-info">
            Thêm banner mới
        </span></a>
    </div>
</div>
                  
<div class="table-responsive mt-4">
    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
        <thead>
            <tr>
                <th scope="col" class="px-0 text-muted">Thumbnail</th>
                <th scope="col" class="px-0 text-muted">Đường dẫn</th>
                <th scope="col" class="px-0 text-muted">Thứ tự</th>
                <th scope="col" class="px-0 text-muted">Trạng thái</th>
                <th scope="col" class="px-0 text-muted">Ngày tạo</th>
                <th scope="col" class="px-0 text-muted"></th>
                <th scope="col" class="px-0 text-muted"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($banners)): ?>
                <?php foreach ($banners as $banner): ?>
                    <tr>
                        <td class="px-0">
                            <div class="d-flex align-items-center">
                                <img src="<?= base_url($banner['image_path']) ?>" alt="banner"
                                     style="max-width:80px; height:auto;" class="img-thumbnail">
                            </div>
                        </td>
                        <td class="px-0"><?= esc($banner['image_path']) ?></td>
                        <td class="px-0"><?= esc($banner['sort_order']) ?></td>
                        <td class="px-0">
                            <?php if ($banner['status'] == 1): ?>
                                <span class="badge bg-success">Hiện</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">Ẩn</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-0"><?= $banner['created_at'] ?></td>
                        <td class="px-0">
                            <a href="<?= base_url('/banners/edit/'.$banner['id']) ?>">Sửa</a>
                        </td>
                        <td class="px-0 text-dark fw-medium text-end">
                            <form action="<?= base_url('/banners/delete/'.$banner['id']) ?>" 
                                  method="post" style="display:inline;" 
                                  onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">Chưa có banner nào</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
