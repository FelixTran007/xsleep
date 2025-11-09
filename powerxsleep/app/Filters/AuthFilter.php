<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = Services::session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Bạn cần đăng nhập trước');
        }

        // Nếu đã đăng nhập, cho phép tiếp tục
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Không làm gì sau response
    }
}
