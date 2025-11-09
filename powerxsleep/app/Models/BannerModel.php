<?php

namespace App\Models;

use CodeIgniter\Model;

class BannerModel extends Model
{
    protected $table      = 'banners';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'image_path',
        'sort_order',
        'status',
        'created_at',
        'updated_at'
    ];

    // Tự động dùng created_at, updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Lấy danh sách banner hiển thị (status = 1), sắp xếp theo sort_order
     */
    public function getActiveBanners()
    {
        return $this->where('status', 1)
                    ->orderBy('sort_order', 'ASC')
                    ->findAll();
    }
}
