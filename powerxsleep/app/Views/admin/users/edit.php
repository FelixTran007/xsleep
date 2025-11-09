<form method="post" action="/users/update/<?= $user['id'] ?>">
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Password (Để trống nếu không muốn thay dổi)</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
