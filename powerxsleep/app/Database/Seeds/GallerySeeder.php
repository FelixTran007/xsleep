<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                $data[] = [
                    'product_id' => $i,
                    'path'       => "uploads/products/product{$i}_gallery{$j}.jpg",
                    'alt_text'   => "Ảnh {$j} của sản phẩm {$i}",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
        }

        $this->db->table('galleries')->insertBatch($data);
    }
}
