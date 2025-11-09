
<div class="d-md-flex align-items-center">
    <div>
        <h4 class="card-title">Danh sách bài viết</h4>
    </div>
    <div class="ms-auto mt-3 mt-md-0">
        <?php if(session()->getFlashdata('success')): ?>
            <p style="color: green"><?= session()->getFlashdata('success') ?></p>
        <?php endif; ?>

        <?php if(session()->getFlashdata('error')): ?>
            <p style="color: red"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        
    </div>
</div>
                  
<div class="table-responsive mt-4">
    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
        <thead>
            <tr>
                <th scope="col" class="px-0 text-muted">Tiêu đề</th>
                <th scope="col" class="px-0 text-muted">Ngôn ngữ</th>
                <th scope="col" class="px-0 text-muted">Ngày tạo</th>
                <th scope="col" class="px-0 text-muted"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pages)): ?>
                <?php foreach ($pages as $page): ?>
                    <tr>
                        <td class="px-0">
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <h6 class="mb-0 fw-bolder"><?= esc($page['title']) ?></h6>
                                </div>
                            </div>
                        </td>
                        <td class="px-0"><?= $page['language'] ?></td>
                        <td class="px-0"><?= $page['created_at'] ?></td>
                        <td class="px-0">
                            <a href="<?= base_url('/pages/edit/'.$page['id']) ?>">Sửa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                    <tr><td colspan="6">Chưa có bài viết nào</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

