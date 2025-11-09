<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PageModel;

class PageController extends BaseController
{
    protected $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
    }

    // Liệt kê danh sách trang tĩnh
    public function index() {        

        $page_title  = "Quản lý trang";
        $pages = $this->pageModel->orderBy('created_at', 'DESC')->findAll();
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/pages/pagelist', ['pages' => $pages]);                

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }


    // Form thêm
    public function create()
    {
        return view('pages/create');
    }

    // Lưu trang mới
    public function store()
    {
        $this->pageModel->save([
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/pages')->with('success', 'Thêm trang thành công!');
    }

    // Form sửa
    public function edit($id)    {
        $page_title  = "Cập nhật trang";
        $page = $this->pageModel->find($id);

        if (!$page) {
            return redirect()->to('/pages')->with('error', 'Trang không tồn tại');
        }
        
        $left_sidebar = view('admin/left_sidebar');
        $right_top_menu  = view('admin/right_top_menu');
        $main_contain  = view('admin/pages/edit', ['page' => $page]);                

        // truyền vào view chính
        return view('admin/index', ['left_sidebar'      => $left_sidebar, 
                                    'right_top_menu'    => $right_top_menu, 
                                    'main_contain'      => $main_contain,
                                    'page_title'        => $page_title
                                    ]);
    }

    // Cập nhật
    public function update($id)
    {
        $page = $this->pageModel->find($id);

        if (!$page) {
            return redirect()->to('/pages')->with('error', 'Trang không tồn tại');
        }

        $this->pageModel->update($id, [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/pages')->with('success', 'Cập nhật thành công!');
    }

    // Xóa
    public function delete($id)
    {
        $page = $this->pageModel->find($id);

        if (!$page) {
            return redirect()->to('/pages')->with('error', 'Trang không tồn tại');
        }

        $this->pageModel->delete($id);

        return redirect()->to('/pages')->with('success', 'Xóa trang thành công!');
    }
}
