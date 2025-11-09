<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPermissionModel extends Model
{
    protected $table      = 'user_permissions';    
    protected $primaryKey = null;         // ⚡ không có cột PK
    protected $useAutoIncrement = false;  // ⚡ tắt auto increment
    protected $allowedFields = ['user_id', 'permission_id'];
    public $timestamps = false;
}
