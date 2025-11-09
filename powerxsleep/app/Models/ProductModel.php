<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name', 'slug', 'sku', 'price', 'sale_price',
        'short_description', 'description',
        'stock_quantity', 'highlights',
        'language', 'type', 'is_bestseller', 'bestseller_sequence',
        'meta_title', 'meta_description','product_content',
        'thumbnail', 'subthumbnails', 'gallery',
        'category_id', 'brand_id',
        'size', 'thickness',
        'status'
    ];

    protected $useTimestamps = true;

    public function getProductsWithBrand(int $limit = 0, int $offset = 0)
    {
        $builder = $this->select('products.*, brands.name as brand_name')
                        ->join('brands', 'brands.id = products.brand_id', 'left')
                        ->orderBy('products.id', 'DESC');

        if ($limit > 0) {
            return $builder->findAll($limit, $offset);
        }

        return $builder->findAll();
    }


    public function getProductDetail(?string $slug = null, ?string $language = 'vn')
    {
        $builder = $this->builder();

        $builder->where('slug', $slug)
                ->where('language', $language)
                ->limit(1);

        
            // In ra SQL để debug
            //echo $builder->getCompiledSelect();
        

        return $builder->get()->getRowArray(); // trả về 1 record dạng array
    }


    public function getProducts(?int $status = null, ?string $type = null, ?string $language = null, int $limit = 0, int $offset = 0)
    {
        $builder = $this->builder();
        $builder->orderBy('id', 'DESC');

        if (!is_null($status)) {
            $builder->where('status', $status);
        }

        if (!is_null($type)) {
            $builder->where('type', $type);
        }

        if (!is_null($language)) {
            $builder->where('language', $language);
        }

        if ($limit > 0) {
            return $builder->get($limit, $offset)->getResultArray();
        }

        //echo $builder->getCompiledSelect(false); exit;

        return $builder->get()->getResultArray();
    }


    public function getBestsellerProducts(?int $status = null, ?string $type = null, ?string $language = null, ?int $is_bestseller = 0, int $limit = 0, int $offset = 0)
    {
        $builder = $this->builder();
        $builder->orderBy('id', 'DESC');

        if (!is_null($status)) {
            $builder->where('status', $status);
        }

        if (!is_null($type)) {
            $builder->where('type', $type);
        }

        if (!is_null($language)) {
            $builder->where('language', $language);
        }

        if (!is_null($is_bestseller)) {
            $builder->where('is_bestseller', $is_bestseller);
        }

        if ($limit > 0) {
            return $builder->get($limit, $offset)->getResultArray();
        }

        //echo $builder->getCompiledSelect(false); exit;

        return $builder->get()->getResultArray();
    }


    public function searchProducts(?string $keyword, string $language = 'vn', int $limit = 20, int $offset = 0): array    {
        $builder = $this->builder();

        if (! empty($keyword)) {
            $builder->groupStart()
                    ->like('name', $keyword)
                    ->orLike('short_description', $keyword)
                    ->orLike('description', $keyword)
                    ->orLike('product_content', $keyword)
                    ->groupEnd();
        }

        $builder->where('language', $language)
                ->orderBy('id', 'DESC');

                //echo $keyword.$builder->getCompiledSelect(false); exit;

        return $builder->get($limit, $offset)->getResultArray();
    }



}
