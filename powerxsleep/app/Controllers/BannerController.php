<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BannerModel;

class BannerController extends BaseController
{
    protected $bannerModel;

    public function __construct()
    {
        $this->bannerModel = new BannerModel();
    }

    // Danh sách
    public function index()
    {
        $banners = $this->bannerModel->orderBy('sort_order', 'ASC')->findAll();
        $page_title  = "Quản lý banner";
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/banners/bannerlist', ['banners' => $banners]);                

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    // Hiển thị form thêm
    public function create()
    {        
        $page_title  = "Thêm banner";
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/banners/create');

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
        
    }

    // Xử lý thêm mới
    public function store()
    {
        $rules = [
            'image_path' => 'required|min_length[3]',
            'sort_order' => 'required|integer',
            'status'     => 'required|in_list[0,1]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', 'Dữ liệu không hợp lệ')->withInput();
        }

        $this->bannerModel->save([
            'image_path' => $this->request->getPost('image_path'),            
            'sort_order' => $this->request->getPost('sort_order'),
            'status'     => $this->request->getPost('status'),
        ]);

        return redirect()->to('/banners')->with('success', 'Thêm banner thành công');
    }

    // Hiển thị form sửa
    public function edit($id)
    {
        $banner = $this->bannerModel->find($id);
        if (! $banner) {
            return redirect()->to('/banners')->with('error', 'Banner không tồn tại');
        }

        $page_title  = "Sửa banner";
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/banners/edit', ['banner' => $banner]);

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    // Xử lý cập nhật
    public function update($id)
    {
        $rules = [
            'image_path' => 'required|min_length[3]',
            'sort_order' => 'required|integer',
            'status'     => 'required|in_list[0,1]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('error', 'Dữ liệu không hợp lệ')->withInput();
        }

        $this->bannerModel->update($id, [
            'image_path' => $this->request->getPost('image_path'),
            'sort_order' => $this->request->getPost('sort_order'),
            'status'     => $this->request->getPost('status'),
        ]);

        return redirect()->to('/banners')->with('success', 'Cập nhật banner thành công');
    }

    // Xóa
    public function delete($id)
    {
        $this->bannerModel->delete($id);
        return redirect()->to('/banners')->with('success', 'Xóa banner thành công');
    }
}
