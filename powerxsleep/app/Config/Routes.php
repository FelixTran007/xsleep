<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // Frontend Routes
// VN
$routes->get('/', 'Home::index', ['as' => 'home_vn']);
$routes->get('lien-he', 'Home::contact_page', ['as' => 'contact_vn']);
$routes->get('san-pham', 'Home::product_list', ['as' => 'product_vn']);
$routes->get('san-pham-goi', 'Home::product_list', ['as' => 'pillow_vn']);
$routes->get('san-pham-nem', 'Home::product_list', ['as' => 'mattress_vn']);
$routes->get('san-pham/(:any)', 'Home::product_detail/$1', ['as' => 'product_detail_vn']);
$routes->get('bai-viet', 'Home::blog_list', ['as' => 'posts_vn']);
$routes->get('xem-bai-viet/(:any)', 'Home::post_detail/$1', ['as' => 'post_detail_vn']);
$routes->get('tim-kiem', 'Home::search', ['as' => 'search_vn']);

// EN




// EN
$routes->get('en', 'Home::index', ['as' => 'home_en']);
$routes->get('contact', 'Home::contact_page', ['as' => 'contact_en']);
$routes->get('products', 'Home::product_list', ['as' => 'product_en']);
$routes->get('pillow', 'Home::product_list', ['as' => 'pillow_en']);
$routes->get('mattress', 'Home::product_list', ['as' => 'mattress_en']);
$routes->get('view-product/(:any)', 'Home::product_detail/$1', ['as' => 'product_detail_en']);
$routes->get('posts', 'Home::blog_list', ['as' => 'posts_en']);
$routes->get('view-post/(:any)', 'Home::post_detail/$1', ['as' => 'post_detail_en']);
$routes->get('search', 'Home::search', ['as' => 'search_en']);

$routes->post('product/quickview', 'Home::quickview');
$routes->get('product/quickview', 'Home::quickview');



// Backend Routes for admin
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginPost');
$routes->get('/logout', 'Auth::logout');


$routes->group('users', function($routes) {
    $routes->get('/', 'UserController::index');

    $routes->get('create-form', 'UserController::createForm');
    $routes->post('create', 'UserController::create');

    $routes->get('edit-form/(:num)', 'UserController::editForm/$1');
    $routes->post('update/(:num)', 'UserController::update/$1');
    $routes->get('delete/(:num)', 'UserController::delete/$1');

    // permissions
    $routes->get('permissions/(:num)', 'UserController::permissions/$1');
    $routes->post('assign-permission/(:num)', 'UserController::assignPermission/$1');
    $routes->get('remove-permission/(:num)/(:num)', 'UserController::removePermission/$1/$2');

    // roles
    $routes->get('roles/(:num)', 'UserController::roles/$1');
    $routes->post('assign-role/(:num)', 'UserController::assignRole/$1');
    $routes->get('remove-role/(:num)/(:num)', 'UserController::removeRole/$1/$2');
});

$routes->get('/post', 'PostController::index');
$routes->get('/post/create', 'PostController::create');
$routes->post('/post/store', 'PostController::store');
$routes->get('/post/edit/(:num)', 'PostController::edit/$1');
$routes->post('/post/update/(:num)', 'PostController::update/$1');
$routes->post('/post/delete/(:num)', 'PostController::delete/$1');


$routes->get('/product', 'ProductController::index');
$routes->get('/product/create', 'ProductController::create');
$routes->post('/product/store', 'ProductController::store');
$routes->get('/product/edit/(:num)', 'ProductController::edit/$1');
$routes->post('/product/update/(:num)', 'ProductController::update/$1');
$routes->get('/product/delete/(:num)', 'ProductController::delete/$1');


$routes->get('banners', 'BannerController::index');
$routes->get('banners/create', 'BannerController::create');
$routes->post('banners/store', 'BannerController::store');
$routes->get('banners/edit/(:num)', 'BannerController::edit/$1');
$routes->post('banners/update/(:num)', 'BannerController::update/$1');
$routes->post('banners/delete/(:num)', 'BannerController::delete/$1');

$routes->get('pages', 'PageController::index');
$routes->get('pages/create', 'PageController::create');
$routes->post('pages/store', 'PageController::store');
$routes->get('pages/edit/(:num)', 'PageController::edit/$1');
$routes->post('pages/update/(:num)', 'PageController::update/$1');
$routes->post('pages/delete/(:num)', 'PageController::delete/$1');


$routes->get('/filemanager', 'FileManagerController::index');
$routes->post('/filemanager', 'FileManagerController::index');


// Chỉ cho phép truy cập nếu đã đăng nhập
$routes->get('/dashboard', 'Auth::dashboard', ['filter' => 'auth']);