<?php

namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController {
    protected $postModel;
    protected $uploadRoot;

    public function __construct() {
        $this->postModel = new PostModel();
        helper('auth');

        $uploadRoot = 'uploads/';
        $upload_folder = "posts";
        $urlFiles = base_url($uploadRoot . $upload_folder);

        session()->set('upload_mode', 'public');
        session()->set('upload_subDir', $upload_folder);
        session()->set('urlFiles', $urlFiles);
    }


    // Danh sách bài viết
    public function index() {
        $posts = $this->postModel->orderBy('created_at', 'DESC')->findAll();
        $page_title  = "Quản lý user";
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/posts/postlist', ['posts' => $posts]);                

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    // Form thêm bài viết
    public function create() {
        $session = session();
        helper('auth');
        $page_title  = "Thêm bài viết";
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/posts/create');

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    // Lưu bài viết mới
    public function store() {
        $title = $this->request->getPost('title');
        $slug = url_title($title, '-', true);

        $this->postModel->save([
            'title'   => $title,
            'slug'    => $slug,
            'thumbnail' => $this->request->getPost('thumbnail'),
            'description' => $this->request->getPost('description'),
            'content' => $this->request->getPost('post_content'),
            'status'  => $this->request->getPost('status'),
        ]);

        return redirect()->to('/posts')->with('success', 'Thêm bài viết thành công!');
    }

    // Form sửa bài viết
    public function edit($id) {
        $post = $this->postModel->find($id);
        if (!$post) {
            return redirect()->to('/posts')->with('error', 'Bài viết không tồn tại');
        }
        
        $page_title  = "Thêm bài viết";
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/posts/edit', ['post' => $post]);

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    // Cập nhật bài viết
    public function update($id)
    {
        $title = $this->request->getPost('title');
        $slug = url_title($title, '-', true);

        $this->postModel->update($id, [
            'title'   => $title,
            'slug'    => $slug,
            'thumbnail' => $this->request->getPost('thumbnail'),
            'description' => $this->request->getPost('description'),
            'content' => $this->request->getPost('post_content'),
            'status'  => $this->request->getPost('status'),
        ]);

        return redirect()->to('/posts')->with('success', 'Cập nhật bài viết thành công!');
    }

    // Xóa bài viết
    public function delete($id)
    {
        $this->postModel->delete($id);
        return redirect()->to('/posts')->with('success', 'Xóa bài viết thành công!');
    }
}
