<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ThumbnailSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'product_id' => $i,
                'path'       => "uploads/products/product{$i}_thumb.jpg",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('thumbnails')->insertBatch($data);
    }
}
