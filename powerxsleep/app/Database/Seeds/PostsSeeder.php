<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PostsSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'title'      => "Bài viết số $i",
                'slug'       => "bai-viet-so-$i",
                'content'    => "Đây là nội dung đơn giản cho bài viết số $i.",
                'status'     => ($i % 2 == 0) ? 'published' : 'draft',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ];
        }

        // Chèn nhiều dòng cùng lúc
        $this->db->table('posts')->insertBatch($data);
    }
}
