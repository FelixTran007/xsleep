<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table      = 'brands';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'name', 'slug', 'logo', 'description', 'created_at', 'updated_at'
    ];

    protected $useTimestamps = true; // dùng created_at, updated_at tự động
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
