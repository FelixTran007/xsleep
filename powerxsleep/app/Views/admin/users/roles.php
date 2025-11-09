<!DOCTYPE html>
<html>
<head>
    <title>User Roles</title>
</head>
<body>
    <h2>Roles for <?= $user['username'] ?></h2>

    <?php if (session()->getFlashdata('message')): ?>
        <p style="color: green"><?= session()->getFlashdata('message') ?></p>
    <?php endif; ?>

    <h3>Current Roles</h3>
    <ul>
        <?php foreach ($userRoles as $role): ?>
            <li>
                <?= $role['name'] ?> - <?= $role['description'] ?>
                <a href="/users/remove-role/<?= $user['id'] ?>/<?= $role['id'] ?>">❌ Remove</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Assign New Role</h3>
    <form method="post" action="/users/assign-role/<?= $user['id'] ?>">
        <select name="role_id">
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role['id'] ?>"><?= $role['name'] ?> - <?= $role['description'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Assign</button>
    </form>

    <p><a href="/users">⬅ Back</a></p>
</body>
</html>
