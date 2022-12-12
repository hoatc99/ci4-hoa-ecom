<?php

namespace App\Controllers\Admin;

use App\Models\User;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->userModel = new User();
    }

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

    public function auth()
    {
        $user = $this->userModel->where([
            'username' => $this->request->getPost('ten_dang_nhap'),
            'password' => $this->request->getPost('mat_khau'),
        ])->first();
        if ($user) {
            session()->set('user', $user);
            return redirect('Admin\HomeController::index');
        }
    }

    public function register()
    {
        $data['title'] = 'Đăng ký';
        return view('register', $data);
    }

    public function logout()
    {
        session()->remove('user');
        return redirect('Admin\HomeController::login');
    }
}
