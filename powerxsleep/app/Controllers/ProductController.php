<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\BrandModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    protected $productModel;
    protected $brandModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->brandModel   = new BrandModel();

        helper('auth');

        $uploadRoot = 'uploads/';
        $upload_folder = "products";
        $urlFiles = base_url($uploadRoot . $upload_folder);

        session()->set('upload_mode', 'public');
        session()->set('upload_subDir', $upload_folder);
        session()->set('urlFiles', $urlFiles);
    }

    // danh sách sản phẩm (có sẵn)
    public function index() {
        $page_title  = "Quản lý sản phẩm";
        $products = $this->productModel->getProductsWithBrand();        
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/products/productlist', ['products' => $products]);                

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    // thêm sản phẩm (có sẵn)
    public function create()
    {
        $page_title  = "Quản lý sản phẩm";
        $brands = $this->brandModel->findAll();
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/products/create', ['brands' => $brands]);                

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    public function store()
    {
        $product_content = $this->request->getPost('product_content');
        $product_content = preg_replace('#<script[^>]*src=["\']?//cdn\.flmngr\.com/.*?</script>#is', '', $product_content);

        $is_bestseller = $this->request->getPost('is_bestseller') ? 1 : 0;
        $subthumbnails = $this->request->getPost('subthumbnails'); 

        $subthumbnails = $this->request->getPost('subthumbnails');

        // loại bỏ các giá trị rỗng và reset index
        $subthumbnails = array_values(array_filter($subthumbnails, function($value) {
            return !empty($value);
        }));

        $this->productModel->save([
            'name'        => $this->request->getPost('name'),
            'thumbnail'        => $this->request->getPost('thumbnail'),
            'sku'       => $this->request->getPost('sku'),
            'type'        => $this->request->getPost('type'),
            'language'        => $this->request->getPost('language'),
            'is_bestseller'        => $is_bestseller,
            'price'       => $this->request->getPost('price'),
            'sale_price'       => $this->request->getPost('sale_price'),
            'subthumbnails'        => json_encode(array_filter($subthumbnails)), // bỏ trống thì loại
            'slug'        => $this->create_optimized_vietnamese_slug($this->request->getPost('name')),
            'description' => $this->request->getPost('description'),
            'short_description'     => $this->request->getPost('short_description'),
            'product_content'     => $product_content,
            'status'    => $this->request->getPost('status'),
            'brand_id'    => $this->request->getPost('brand_id'),
            'stock_quantity'       => $this->request->getPost('stock_quantity'),
        ]);

        return redirect()->to('/product')->with('success', 'Thêm sản phẩm thành công!');
    }

    // sửa sản phẩm
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        $brands  = $this->brandModel->findAll();

        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Không tìm thấy sản phẩm');
        }

        $page_title  = "Quản lý sản phẩm";
        $brands = $this->brandModel->findAll();
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/products/edit', ['brands' => $brands, 'product' => $product]);

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    public function update($id)
    {
        $is_bestseller = $this->request->getPost('is_bestseller') ? 1 : 0;
        $subthumbnails = $this->request->getPost('subthumbnails'); 

        $subthumbnails = $this->request->getPost('subthumbnails');

        // loại bỏ các giá trị rỗng và reset index
        $subthumbnails = array_values(array_filter($subthumbnails, function($value) {
            return !empty($value);
        }));

        $product_content = $this->request->getPost('product_content');
        $product_content = preg_replace('#<script[^>]*src=["\']?//cdn\.flmngr\.com/.*?</script>#is', '', $product_content);
        

        $this->productModel->update($id, [
            'name'        => $this->request->getPost('name'),
            'thumbnail'        => $this->request->getPost('thumbnail'),
            'sku'       => $this->request->getPost('sku'),
            'price'       => $this->request->getPost('price'),
            'sale_price'       => $this->request->getPost('sale_price'),
            'slug'        => $this->create_optimized_vietnamese_slug($this->request->getPost('name')),
            'type'        => $this->request->getPost('type'),
            'language'        => $this->request->getPost('language'),
            'is_bestseller'        => $is_bestseller,
            'description' => $this->request->getPost('description'),
            'subthumbnails'        => json_encode(array_filter($subthumbnails)), // bỏ trống thì loại
            'short_description'     => $this->request->getPost('short_description'),
            'product_content'     => $product_content,
            'status'    => $this->request->getPost('status'),
            'brand_id'    => $this->request->getPost('brand_id'),
            'stock_quantity'       => $this->request->getPost('stock_quantity'),
        ]);

        return redirect()->to('/product')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // xóa sản phẩm
    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/product')->with('success', 'Xóa sản phẩm thành công!');
    }


    // Thêm một hàm tối ưu hơn, sử dụng `URL Helper` có sẵn của CI4
    // và một bảng ánh xạ dấu
    public function create_optimized_vietnamese_slug(string $text): string  {
        // 1. Chuyển về chữ thường
        $text = mb_strtolower($text, 'UTF-8');

        // 2. Bảng ánh xạ các ký tự tiếng Việt có dấu sang không dấu
        $map = array(
            '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/' => 'a',
            '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/'               => 'e',
            '/ì|í|ị|ỉ|ĩ/'                           => 'i',
            '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/'   => 'o',
            '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/'               => 'u',
            '/ỳ|ý|ỵ|ỷ|ỹ/'                           => 'y',
            '/đ/'                                   => 'd',
            '/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/' => 'A', // Dù đã lowercase nhưng để phòng hờ
            '/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/'               => 'E',
            '/Ì|Í|Ị|Ỉ|Ĩ/'                           => 'I',
            '/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/'   => 'O',
            '/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/'               => 'U',
            '/Ỳ|Ý|Ỵ|Ỷ|Ỹ/'                           => 'Y',
            '/Đ/'                                   => 'D',
            '/[^a-z0-9\s-]/u'                      => '',   // Loại bỏ các ký tự đặc biệt
            '/[\s-]+/'                              => '-',  // Thay thế khoảng trắng/dấu gạch ngang thành một dấu gạch ngang duy nhất
        );

        $text = preg_replace(array_keys($map), array_values($map), $text);
        $text = trim($text, '-'); // Loại bỏ gạch ngang ở đầu và cuối

        return $text;
    }
}
