
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
        
        <a class="px-0" href="/post/create"><span class="badge bg-info">
            Thêm bài viết mới
        </span></a>
    </div>
</div>
                  
<div class="table-responsive mt-4">
    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
        <thead>
            <tr>
                <th scope="col" class="px-0 text-muted">Tiêu đề</th>
                <th scope="col" class="px-0 text-muted">Slug</th>
                <th scope="col" class="px-0 text-muted">Trạng thái</th>
                <th scope="col" class="px-0 text-muted">Ngày tạo</th>
                <th scope="col" class="px-0 text-muted"></th>
                <th scope="col" class="px-0 text-muted"></th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td class="px-0">
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <h6 class="mb-0 fw-bolder"><?= esc($post['title']) ?></h6>
                                </div>
                            </div>
                        </td>
                        <td class="px-0"><?= esc($post['slug']) ?></td>
                        <td class="px-0"><?= esc($post['status']) ?></td>
                        <td class="px-0"><?= $post['created_at'] ?></td>
                        <td class="px-0">
                            <a href="<?= base_url('/post/edit/'.$post['id']) ?>">Sửa</a>
                        </td>
                        <td class="px-0 text-dark fw-medium text-end">
                            <form action="<?= base_url('/post/delete/'.$post['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                <button type="submit">Xóa</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                    <tr><td colspan="6">Chưa có bài viết nào</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

