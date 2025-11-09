<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Everon',
                'slug'        => 'everon',
                'logo'        => 'uploads/brands/everon.png',
                'description' => 'Thương hiệu nệm Everon cao cấp, nổi tiếng tại Việt Nam.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Kim Cương',
                'slug'        => 'kim-cuong',
                'logo'        => 'uploads/brands/kimcuong.png',
                'description' => 'Nệm Kim Cương – chất lượng, bền bỉ.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Liên Á',
                'slug'        => 'lien-a',
                'logo'        => 'uploads/brands/liena.png',
                'description' => 'Liên Á – thương hiệu nệm Việt uy tín.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Vạn Thành',
                'slug'        => 'van-thanh',
                'logo'        => 'uploads/brands/vanthanh.png',
                'description' => 'Nệm Vạn Thành – hơn 20 năm phát triển.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'name'        => 'Kymdan',
                'slug'        => 'kymdan',
                'logo'        => 'uploads/brands/kymdan.png',
                'description' => 'Kymdan – thương hiệu cao su nổi tiếng.',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('brands')->insertBatch($data);
    }
}
