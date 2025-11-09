<div class="d-md-flex align-items-center">
    <div>
        <h4 class="card-title">User List</h4>
    </div>
    <div class="ms-auto mt-3 mt-md-0">
    <a class="px-0" href="/users/create-form"><span class="badge bg-info">
        Thêm user
        </span></a>
    </div>
</div>
                  
<div class="table-responsive mt-4">
    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
        <thead>
            <tr>
                <th scope="col" class="px-0 text-muted"></th>
                <th scope="col" class="px-0 text-muted"></th>
                <th scope="col" class="px-0 text-muted"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td class="px-0">
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <h6 class="mb-0 fw-bolder"><?= $user['username'] ?></h6>
                                <span class="text-muted"><?= $user['email'] ?></span>
                            </div>
                        </div>
                    </td>
                    <td class="px-0"><a href="/users/edit-form/<?= $user['id'] ?>">✏️ Cập nhật</a></td>
                    <td class="px-0">
                        <a href="/users/delete/<?= $user['id'] ?>" onclick="return confirm('Delete user?')">🗑️ Xóa user</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>