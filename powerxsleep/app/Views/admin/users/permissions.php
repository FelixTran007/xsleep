<!DOCTYPE html>
<html>
<head>
    <title>User Permissions</title>
</head>
<body>
    <h2>Permissions for <?= $user['username'] ?></h2>

    <?php if (session()->getFlashdata('message')): ?>
        <p style="color: green"><?= session()->getFlashdata('message') ?></p>
    <?php endif; ?>

    <h3>Current Permissions</h3>
    <ul>
        <?php foreach ($userPermissions as $perm): ?>
            <li>
                <?= $perm['name'] ?> 
                <a href="/users/remove-permission/<?= $user['id'] ?>/<?= $perm['id'] ?>">❌ Remove</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Assign New Permission</h3>
    <form method="post" action="/users/assign-permission/<?= $user['id'] ?>">
        <select name="permission_id">
            <?php foreach ($permissions as $perm): ?>
                <option value="<?= $perm['id'] ?>"><?= $perm['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Assign</button>
    </form>

    <p><a href="/users">⬅ Back</a></p>
</body>
</html>
