<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use EdSDK\FlmngrServer\FlmngrServer;

class FileManagerController extends BaseController
{
    public function index()    {
        $uploadRoot = 'uploads/';
        $mode   = session()->get('upload_mode') ?? 'public';
        $subDir = session()->get('upload_subDir') ?? '';

        if($mode == "private")
            $uploadDir = WRITEPATH . $uploadRoot . $subDir;
        else
            $uploadDir = FCPATH . $uploadRoot . $subDir;


        FlmngrServer::flmngrRequest([
            'dirFiles' => $uploadDir,
        ]);

        die;
    }
}