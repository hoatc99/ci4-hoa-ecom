<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Trang chủ';
        return view('admin/pages/home', $data);
    }

    public function login()
    {
        $data['title'] = 'Đăng nhập';
        return view('admin/pages/login', $data);
    }

    public function register()
    {
        $data['title'] = 'Đăng ký';
        return view('register', $data);
    }
}
