<?php

use Config\Database;

if (!function_exists('hasPermission')) {
    /**
     * Kiểm tra user có quyền cụ thể không
     *
     * @param int $userId
     * @param string $permissionName (ví dụ: 'products.create')
     * @return bool
     */
    function hasPermission(int $userId, string $permissionName): bool
    {
        $db = Database::connect();

        // 1. Super Admin => luôn có tất cả quyền
        $builder = $db->table('user_roles ur')
            ->join('roles r', 'r.id = ur.role_id')
            ->where('ur.user_id', $userId)
            ->where('r.name', 'super_admin');

        if ($builder->countAllResults() > 0) {
            return true;
        }

        // 2. Lấy permission_id từ tên quyền
        $perm = $db->table('permissions')
            ->select('id')
            ->where('name', $permissionName)
            ->get()
            ->getRow();

        if (!$perm) {
            return false; // quyền không tồn tại trong hệ thống
        }

        $permissionId = $perm->id;

        // 3. Check override trong user_permissions
        $override = $db->table('user_permissions')
            ->select('type')
            ->where('user_id', $userId)
            ->where('permission_id', $permissionId)
            ->get()
            ->getRow();

        if ($override) {
            if ($override->type === 'deny') {
                return false; // deny thì chặn luôn
            }
            if ($override->type === 'allow') {
                return true; // allow thì cấp quyền luôn
            }
        }

        // 4. Nếu không có override => kiểm tra theo role
        $builder = $db->table('user_roles ur')
            ->join('role_permissions rp', 'rp.role_id = ur.role_id')
            ->where('ur.user_id', $userId)
            ->where('rp.permission_id', $permissionId);

        return $builder->countAllResults() > 0;
    }
}



