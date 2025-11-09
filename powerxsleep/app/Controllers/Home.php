<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\BrandModel;
use App\Models\BannerModel;
use App\Models\PageModel;
use App\Models\PostModel;


class Home extends BaseController
{
    protected $productModel;
    protected $brandModel;
    protected $bannerModel;
    protected $pageModel;
    protected $postModel;    

    // Dữ liệu dùng chung cho tất cả view
    protected array $sharedData = [];


    public function initController(\CodeIgniter\HTTP\RequestInterface $request, 
                                   \CodeIgniter\HTTP\ResponseInterface $response, 
                                   \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // Bây giờ $this->locale đã đúng (vn|en)
        $this->productModel = new ProductModel();
        $this->brandModel   = new BrandModel();
        $this->bannerModel  = new BannerModel();
        $this->pageModel    = new PageModel();
        $this->postModel    = new PostModel();
        $langulage = $this->locale;
        
        $this->sharedData['banners'] = $this->bannerModel->getActiveBanners();

        if($langulage == "en") {
            $this->sharedData['header'] = view('frontend/en/header');
            $this->sharedData['mobile_menu'] = view('frontend/en/mobile_menu');
            $this->sharedData['footer_menu'] = view('frontend/en/footer_menu');
        }
        else {
            $this->sharedData['header'] = view('frontend/vn/header');
            $this->sharedData['mobile_menu'] = view('frontend/vn/mobile_menu');
            $this->sharedData['footer_menu'] = view('frontend/vn/footer_menu');
        }
    }   


    public function index(): string {
        $products = $this->productModel->getProducts(1, null, $this->locale);
        $posts = $this->postModel->getActivePosts($this->locale);
        $locale = $this->locale;

        $goi_products = $this->productModel->getProducts(1, "goi", $this->locale);
        $nem_products = $this->productModel->getProducts(1, "nem", $this->locale);

        $goi_best_seller = $this->productModel->getBestsellerProducts(1, "goi", $this->locale, 1);
        $nem_best_seller = $this->productModel->getBestsellerProducts(1, "nem", $this->locale, 1);

        

        if($locale == "en") {
            $client_says  = view('frontend/en/client_says');
            $group_products = view('frontend/en/group_products');
        }
        else {
            $client_says  = view('frontend/vn/client_says');
            $group_products = view('frontend/vn/group_products');
        }

        $mobile_menu = $this->sharedData['mobile_menu'];
        $frontend_header = $this->sharedData['header'];
        $header_banner = view('frontend/header_banner', ['banners' => $this->sharedData['banners']]);
        $middle_banner = view('frontend/middle_banner');
        $various_products = view('frontend/various_products', ['products' => $products, 'goi_products' => $goi_products, 'nem_products' => $nem_products, 'locale' => $locale]);
        
        $featured_collections  = view('frontend/featured_collections', ['products' => $products]);
        
        $mattress_bestseller  = view('frontend/mattress_bestseller', ['products' => $nem_best_seller, 'locale' => $locale]);
        $pillow_bestseller  = view('frontend/pillow_bestseller', ['products' => $goi_best_seller, 'locale' => $locale]);
        $hot_banner  = view('frontend/hot_banner');
        $lastest_blog  = view('frontend/lastest_blog', ['posts' => $posts, 'locale' => $locale]);
        $footer_menu  = $this->sharedData['footer_menu'];
        $bottom_footer  = view('frontend/bottom_footer');
        //$popup_product  = view('frontend/popup_product');
        //$popup_product = "";

        return view('frontend/index', ['frontend_header'    => $frontend_header, 
                                    'header_banner'         => $header_banner, 
                                    'mobile_menu'           => $mobile_menu, 
                                    'middle_banner'         => $middle_banner, 
                                    'various_products'      => $various_products,
                                    'group_products'        => $group_products,
                                    'featured_collections'  => $featured_collections,
                                    'client_says'           => $client_says,
                                    'mattress_bestseller'          => $mattress_bestseller,
                                    'pillow_bestseller'             => $pillow_bestseller,
                                    'hot_banner'            => $hot_banner,
                                    'lastest_blog'          => $lastest_blog,
                                    'footer_menu'           => $footer_menu,
                                    'bottom_footer'         => $bottom_footer,
                                    //'popup_product'         => $popup_product,
                                    ]);
    }


    public function product_list() {
        $locale = $this->locale;
        $uri = service('uri');   // hoặc $this->request->uri
        $firstSegment = $uri->getSegment(1);


        if($locale == "en") {
            if ($firstSegment === 'products') {
                $products = $this->productModel->getProducts(1, null, $locale);
                $category_title = lang('App.products');                
            }
            elseif ($firstSegment === 'pillow') {
                $products = $this->productModel->getProducts(1, "goi", $locale);
                $category_title = lang('App.pillow_group');                
            }
            elseif ($firstSegment === 'mattress') {
                $products = $this->productModel->getProducts(1, "nem", $locale);
                $category_title = lang('App.mattress_group');                
            }
            else {
                $products = $this->productModel->getProducts(1, null, $locale);
                $category_title = lang('App.products');                
            }
        }
        else {            
            if ($firstSegment === 'san-pham') {
                $products = $this->productModel->getProducts(1, null, $locale);
                $category_title = lang('App.products');                
            }
            elseif ($firstSegment === 'san-pham-goi') {
                $products = $this->productModel->getProducts(1, "goi", $locale);
                $category_title = lang('App.pillow_group');                
            }
            elseif ($firstSegment === 'san-pham-nem') {
                $products = $this->productModel->getProducts(1, "nem", $locale);
                $category_title = lang('App.mattress_group');                
            }
            else {
                $products = $this->productModel->getProducts(1, null, $locale);
                $category_title = lang('App.products');
            }
        }

        
        

        $mobile_menu = $this->sharedData['mobile_menu'];
        $frontend_header = $this->sharedData['header'];
        $header_banner = view('frontend/header_banner', ['banners' => $this->sharedData['banners']]);
        $middle_banner = view('frontend/middle_banner');
        $various_products = "";
        $group_products = "";// view('frontend/group_products');        
        $featured_collections  = view('frontend/featured_collections', ['products' => $products, 'locale' => $locale]);
        //$client_says  = view('frontend/client_says');
        $client_says  = "";
        $mattress_bestseller  = view('frontend/mattress_bestseller', ['products' => $products, 'locale' => $locale]);
        $pillow_bestseller  = view('frontend/pillow_bestseller', ['products' => $products, 'locale' => $locale]);
        $hot_banner  = view('frontend/hot_banner');
        $lastest_blog  = "";
        $footer_menu  = $this->sharedData['footer_menu'];
        $bottom_footer  = view('frontend/bottom_footer');
        $product_list  = view('frontend/product_list', ['products' => $products, 'locale' => $locale, 'category_title' => $category_title, 'category_link' => $firstSegment]);
        //$popup_product  = view('frontend/popup_product');
        //$popup_product = "";

        return view('frontend/subpage', ['frontend_header'    => $frontend_header, 
                                    'header_banner'         => $header_banner, 
                                    'mobile_menu'           => $mobile_menu, 
                                    'middle_banner'         => $middle_banner, 
                                    'various_products'      => $various_products,
                                    'group_products'        => $group_products,
                                    'featured_collections'  => $featured_collections,
                                    'client_says'           => $client_says,
                                    'mattress_bestseller'          => $mattress_bestseller,
                                    'pillow_bestseller'             => $pillow_bestseller,
                                    'hot_banner'            => $hot_banner,
                                    'lastest_blog'          => $lastest_blog,
                                    'footer_menu'           => $footer_menu,
                                    'bottom_footer'         => $bottom_footer,
                                    'subpage_content'       => $product_list,
                                    //'popup_product'         => $popup_product,
                                    ]);
    }


    public function product_detail($slug) {
        $locale = $this->locale;
        //$product_detail = $this->productModel->where('slug', $slug)
        //                                    ->where('language', $this->locale) // lọc theo ngôn ngữ hiện tại
        //                                    ->first();

        $product_detail = $this->productModel->getProductDetail($slug, $this->locale);
        $category_title = lang('App.products');

        $uri = service('uri');   // hoặc $this->request->uri
        $firstSegment = $uri->getSegment(1);

                                            

        if (empty($product_detail)) {
            $product_detail = array();
            $products = array();
        }
        else {        
            if($product_detail["type"] == "goi")
                $products = $this->productModel->getProducts(1, "goi", $this->locale);
            elseif($product_detail["type"] == "nem")
                $products = $this->productModel->getProducts(1, "nem", $this->locale);
            else
                $products = $this->productModel->getProducts(1, null, $this->locale);
        }

                

        $mobile_menu = $this->sharedData['mobile_menu'];
        $frontend_header = $this->sharedData['header'];
        $header_banner = view('frontend/header_banner', ['banners' => $this->sharedData['banners']]);
        $middle_banner = view('frontend/middle_banner');
        //$various_products = view('frontend/various_products', ['products' => $products]);
        $various_products = "";
        $group_products = "";// view('frontend/group_products');        
        $featured_collections  = ""; //view('frontend/featured_collections', ['products' => $products]);
        //$client_says  = view('frontend/client_says');
        $client_says  = "";
        $mattress_bestseller  = ""; //view('frontend/mattress_bestseller', ['products' => $products]);
        $pillow_bestseller  = ""; //view('frontend/pillow_bestseller', ['products' => $products]);
        $hot_banner  = view('frontend/hot_banner');
        $lastest_blog  = "";
        $footer_menu  = $this->sharedData['footer_menu'];
        $bottom_footer  = view('frontend/bottom_footer');
        $product_detail  = view('frontend/product_detail', ['product_detail' => $product_detail, 'products' => $products, 'locale' => $locale, 'category_title' => $category_title, 'category_link' => $firstSegment]);
        //$popup_product  = view('frontend/popup_product');
        //$popup_product = "";

        return view('frontend/subpage', ['frontend_header'    => $frontend_header, 
                                    'header_banner'         => $header_banner, 
                                    'mobile_menu'           => $mobile_menu, 
                                    'middle_banner'         => $middle_banner, 
                                    'various_products'      => $various_products,
                                    'group_products'        => $group_products,
                                    'featured_collections'  => $featured_collections,
                                    'client_says'           => $client_says,
                                    'mattress_bestseller'          => $mattress_bestseller,
                                    'pillow_bestseller'             => $pillow_bestseller,
                                    'hot_banner'            => $hot_banner,
                                    'lastest_blog'          => $lastest_blog,
                                    'footer_menu'           => $footer_menu,
                                    'bottom_footer'         => $bottom_footer,
                                    'subpage_content'       => $product_detail,
                                    //'popup_product'         => $popup_product,
                                    ]);
    }


    public function contact_page() {        
        if($this->locale == "en")
            $page = $this->pageModel->find(2);
        else
            $page = $this->pageModel->find(1);

        $uri = service('uri');   // hoặc $this->request->uri
        $firstSegment = $uri->getSegment(1);
        

        $products = $this->productModel->getProductsWithBrand();   
        $locale = $this->locale;        
        $category_title = lang('App.contact');

        if($this->locale == "en")
            $page_detail  = view('frontend/en/contact_page', ['page' => $page, 'locale' => $locale, 'category_title' => $category_title, 'category_link' => $firstSegment]);
        else
            $page_detail  = view('frontend/vn/contact_page', ['page' => $page, 'locale' => $locale, 'category_title' => $category_title, 'category_link' => $firstSegment]);

        $mobile_menu = $this->sharedData['mobile_menu'];
        $frontend_header = $this->sharedData['header'];
        $header_banner = view('frontend/header_banner', ['banners' => $this->sharedData['banners']]);
        $middle_banner = view('frontend/middle_banner');
        $various_products = "";
        $group_products = "";// view('frontend/group_products');        
        $featured_collections  = "";
        //$client_says  = view('frontend/client_says');
        $client_says  = "";
        $mattress_bestseller  = "";
        $pillow_bestseller  = "";
        $hot_banner  = view('frontend/hot_banner');
        $lastest_blog  = "";
        $footer_menu  = $this->sharedData['footer_menu'];
        $bottom_footer  = view('frontend/bottom_footer');
        

        return view('frontend/subpage', ['frontend_header'    => $frontend_header, 
                                    'header_banner'         => $header_banner, 
                                    'mobile_menu'           => $mobile_menu, 
                                    'middle_banner'         => $middle_banner, 
                                    'various_products'      => $various_products,
                                    'group_products'        => $group_products,
                                    'featured_collections'  => $featured_collections,
                                    'client_says'           => $client_says,
                                    'mattress_bestseller'          => $mattress_bestseller,
                                    'pillow_bestseller'             => $pillow_bestseller,
                                    'hot_banner'            => $hot_banner,
                                    'lastest_blog'          => $lastest_blog,
                                    'footer_menu'           => $footer_menu,
                                    'bottom_footer'         => $bottom_footer,
                                    'subpage_content'       => $page_detail,
                                    //'popup_product'         => $popup_product,
                                    ]);
    }



    public function blog_list() {              
        $locale = $this->locale;  
        $blog_list = $this->postModel->getActivePosts($this->locale);

        $uri = service('uri');   // hoặc $this->request->uri
        $firstSegment = $uri->getSegment(1);
        $category_title = lang('App.posts');

        

        $mobile_menu = $this->sharedData['mobile_menu'];
        $frontend_header = $this->sharedData['header'];
        $header_banner = view('frontend/header_banner', ['banners' => $this->sharedData['banners']]);
        $middle_banner = view('frontend/middle_banner');
        $various_products = "";
        $group_products = "";// view('frontend/group_products');        
        $featured_collections  = "";
        //$client_says  = view('frontend/client_says');
        $client_says  = "";
        $mattress_bestseller  = "";
        $pillow_bestseller  = "";
        $hot_banner  = view('frontend/hot_banner');
        $lastest_blog  = "";
        $footer_menu  = $this->sharedData['footer_menu'];
        $bottom_footer  = view('frontend/bottom_footer');
        $blog_list  = view('frontend/blog_list', ['blog_list' => $blog_list, 'locale' => $locale, 'category_title' => $category_title, 'category_link' => $firstSegment]);
        //$popup_product  = view('frontend/popup_product');
        //$popup_product = "";

        return view('frontend/subpage', ['frontend_header'    => $frontend_header, 
                                    'header_banner'         => $header_banner, 
                                    'mobile_menu'           => $mobile_menu, 
                                    'middle_banner'         => $middle_banner, 
                                    'various_products'      => $various_products,
                                    'group_products'        => $group_products,
                                    'featured_collections'  => $featured_collections,
                                    'client_says'           => $client_says,
                                    'mattress_bestseller'          => $mattress_bestseller,
                                    'pillow_bestseller'             => $pillow_bestseller,
                                    'hot_banner'            => $hot_banner,
                                    'lastest_blog'          => $lastest_blog,
                                    'footer_menu'           => $footer_menu,
                                    'bottom_footer'         => $bottom_footer,
                                    'subpage_content'       => $blog_list,
                                    //'popup_product'         => $popup_product,
                                    ]);
    }


    public function post_detail($slug) {
        $locale = $this->locale;
        $post_detail = $this->postModel->where('slug', $slug)
                                        ->where('language', $this->locale) // lọc theo ngôn ngữ hiện tại
                                        ->first();
        $blog_list = $this->postModel->getActivePosts($this->locale);
        $category_title = lang('App.posts');

        $uri = service('uri');   // hoặc $this->request->uri
        $firstSegment = $uri->getSegment(1);


        $mobile_menu = $this->sharedData['mobile_menu'];
        $frontend_header = $this->sharedData['header'];
        $header_banner = view('frontend/header_banner', ['banners' => $this->sharedData['banners']]);
        $middle_banner = view('frontend/middle_banner');
        $various_products = "";
        $group_products = "";// view('frontend/group_products');        
        $featured_collections  = "";
        //$client_says  = view('frontend/client_says');
        $client_says  = "";
        $mattress_bestseller  = "";
        $pillow_bestseller  = "";
        $hot_banner  = view('frontend/hot_banner');
        $lastest_blog  = "";
        $footer_menu  = $this->sharedData['footer_menu'];
        $bottom_footer  = view('frontend/bottom_footer');
        $post_detail  = view('frontend/post_detail', ['post_detail' => $post_detail, 'locale' => $locale, 'category_title' => $category_title, 'category_link' => $firstSegment]);
        //$popup_product  = view('frontend/popup_product');
        //$popup_product = "";

        return view('frontend/subpage', ['frontend_header'    => $frontend_header, 
                                    'header_banner'         => $header_banner, 
                                    'mobile_menu'           => $mobile_menu, 
                                    'middle_banner'         => $middle_banner, 
                                    'various_products'      => $various_products,
                                    'group_products'        => $group_products,
                                    'featured_collections'  => $featured_collections,
                                    'client_says'           => $client_says,
                                    'mattress_bestseller'          => $mattress_bestseller,
                                    'pillow_bestseller'             => $pillow_bestseller,
                                    'hot_banner'            => $hot_banner,
                                    'lastest_blog'          => $lastest_blog,
                                    'footer_menu'           => $footer_menu,
                                    'bottom_footer'         => $bottom_footer,
                                    'subpage_content'       => $post_detail,
                                    //'popup_product'         => $popup_product,
                                    ]);
    }



    public function search()
    {
        $keyword = trim((string) $this->request->getGet('q')); // luôn trả về string
        $lang    = $this->locale; // kế thừa từ BaseController
        $category_title = lang('App.search');

        $uri = service('uri');   // hoặc $this->request->uri
        $firstSegment = $uri->getSegment(1);

        $products = $this->productModel->searchProducts($keyword, $lang);
        $posts    = $this->postModel->searchPosts($keyword, $lang);
        $locale = $this->locale;

        

        $mobile_menu = $this->sharedData['mobile_menu'];
        $frontend_header = $this->sharedData['header'];
        $header_banner = view('frontend/header_banner', ['banners' => $this->sharedData['banners']]);
        $middle_banner = view('frontend/middle_banner');
        $various_products = "";
        $group_products = "";// view('frontend/group_products');        
        $featured_collections  = view('frontend/featured_collections', ['products' => $products, 'locale' => $locale]);
        //$client_says  = view('frontend/client_says');
        $client_says  = "";
        $mattress_bestseller  = view('frontend/mattress_bestseller', ['products' => $products]);
        $pillow_bestseller  = view('frontend/pillow_bestseller', ['products' => $products]);
        $hot_banner  = view('frontend/hot_banner');
        $lastest_blog  = "";
        $footer_menu  = $this->sharedData['footer_menu'];
        $bottom_footer  = view('frontend/bottom_footer');
        $search_result  = view('frontend/search', ['products' => $products, 'posts' => $posts, 'keyword' => $keyword, 'locale' => $locale, 'category_title' => $category_title, 'category_link' => $firstSegment]);
        //$popup_product  = view('frontend/popup_product');
        //$popup_product = "";

        return view('frontend/subpage', ['frontend_header'    => $frontend_header, 
                                    'header_banner'         => $header_banner, 
                                    'mobile_menu'           => $mobile_menu, 
                                    'middle_banner'         => $middle_banner, 
                                    'various_products'      => $various_products,
                                    'group_products'        => $group_products,
                                    'featured_collections'  => $featured_collections,
                                    'client_says'           => $client_says,
                                    'mattress_bestseller'          => $mattress_bestseller,
                                    'pillow_bestseller'             => $pillow_bestseller,
                                    'hot_banner'            => $hot_banner,
                                    'lastest_blog'          => $lastest_blog,
                                    'footer_menu'           => $footer_menu,
                                    'bottom_footer'         => $bottom_footer,
                                    'subpage_content'       => $search_result,
                                    //'popup_product'         => $popup_product,
                                    ]);
    }


    public function quickview() {
        $id             = $this->request->getPost('id');
        $product_detail = $this->productModel->find($id);
        $brands         = $this->brandModel->findAll();

        if (!$product_detail) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Không tìm thấy sản phẩm');
        }

        //print_r($product_detail);

        // Trả về HTML để render trong modal
        return view('frontend/popup_product', ['product_detail' => $product_detail]);
    }
}
