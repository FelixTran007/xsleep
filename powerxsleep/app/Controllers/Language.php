<?php

namespace App\Controllers;

class Language extends BaseController
{
    public function switch($lang = 'vi')
    {
        if (in_array($lang, ['vi', 'en'])) {
            session()->set('lang', $lang);
        }
        return redirect()->back(); // quay lại trang trước
    }
}
