<?php

namespace App\Models;

use CodeIgniter\Model;

class UserRoleModel extends Model
{
    protected $table = 'user_roles';
    protected $primaryKey = null;         // ⚡ không có cột PK
    protected $useAutoIncrement = false;  // ⚡ tắt auto increment
    protected $allowedFields = ['user_id', 'role_id'];
    public $timestamps = false;
}
