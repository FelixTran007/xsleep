<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'title', 'slug', 'thumbnail', 'description', 'content', 'status', 'created_at', 'updated_at', 'deleted_at'
    ];

    protected $useTimestamps = true; // sẽ tự động set created_at & updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    
    public function getActivePosts(string $language = 'vn')
    {
        return $this->where('status', 'published')
                    ->where('language', $language)
                    ->orderBy('updated_at', 'ASC')
                    ->findAll();
    }


    public function searchPosts(string $keyword, string $language = 'vn', int $limit = 20, int $offset = 0): array    {
        $builder = $this->builder();
        $builder->like('title', $keyword)
                ->orLike('content', $keyword)
                ->orLike('description', $keyword)
                ->where('language', $language)
                ->orderBy('id', 'DESC');

        return $builder->get($limit, $offset)->getResultArray();
    }

}
