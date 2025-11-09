<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RbacSeeder extends Seeder
{
    public function run()
    {
        // Insert Roles
        $roles = [
            ['name' => 'super_admin', 'description' => 'Quản trị hệ thống, quản lý user & phân quyền'],
            ['name' => 'admin_products', 'description' => 'Quản trị sản phẩm'],
            ['name' => 'admin_posts', 'description' => 'Quản trị bài viết'],
            ['name' => 'admin_orders', 'description' => 'Quản trị đơn hàng'],
            ['name' => 'admin_reports', 'description' => 'Quản trị báo cáo'],
            ['name' => 'user', 'description' => 'Người dùng thường'],
        ];
        $this->db->table('roles')->insertBatch($roles);

        // Insert Permissions
        $permissions = [
            ['name' => 'products.create', 'description' => 'Thêm sản phẩm'],
            ['name' => 'products.edit', 'description' => 'Sửa sản phẩm'],
            ['name' => 'products.delete', 'description' => 'Xóa sản phẩm'],
            ['name' => 'posts.create', 'description' => 'Thêm bài viết'],
            ['name' => 'posts.edit', 'description' => 'Sửa bài viết'],
            ['name' => 'posts.delete', 'description' => 'Xóa bài viết'],
            ['name' => 'orders.approve', 'description' => 'Duyệt đơn hàng'],
            ['name' => 'orders.cancel', 'description' => 'Hủy đơn hàng'],
            ['name' => 'reports.view', 'description' => 'Xem báo cáo'],
        ];
        $this->db->table('permissions')->insertBatch($permissions);

        // Insert Users
        $users = [
            [
                'username'      => 'superadmin',
                'email'         => 'superadmin@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'status'        => 1
            ],
            [
                'username'      => 'product_admin',
                'email'         => 'product_admin@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'status'        => 1
            ],
            [
                'username'      => 'normal_user',
                'email'         => 'user@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'status'        => 1
            ],
        ];
        $this->db->table('users')->insertBatch($users);

        // Map User ↔ Role
        $userRoles = [
            ['user_id' => 1, 'role_id' => 1], // superadmin → super_admin
            ['user_id' => 2, 'role_id' => 2], // product_admin → admin_products
            ['user_id' => 3, 'role_id' => 6], // normal_user → user
        ];
        $this->db->table('user_roles')->insertBatch($userRoles);

        // Map Role ↔ Permissions (ví dụ gán sản phẩm cho admin_products)
        $rolePermissions = [
            ['role_id' => 2, 'permission_id' => 1], // admin_products → products.create
            ['role_id' => 2, 'permission_id' => 2], // admin_products → products.edit
            ['role_id' => 2, 'permission_id' => 3], // admin_products → products.delete
        ];
        $this->db->table('role_permissions')->insertBatch($rolePermissions);

        // Gán đặc biệt cho 1 user (user thường nhưng có quyền xem báo cáo)
        $userPermissions = [
            ['user_id' => 3, 'permission_id' => 9], // normal_user → reports.view
        ];
        $this->db->table('user_permissions')->insertBatch($userPermissions);
    }
}
