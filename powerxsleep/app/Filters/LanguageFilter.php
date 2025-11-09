<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LanguageFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $locale  = $session->get('lang') ?? 'vi'; // mặc định 'vi'

        // chỉ hỗ trợ en hoặc vi
        if (! in_array($locale, ['vi', 'en'])) {
            $locale = 'vi';
        }

        service('request')->setLocale($locale);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // không cần xử lý gì thêm
    }
}
