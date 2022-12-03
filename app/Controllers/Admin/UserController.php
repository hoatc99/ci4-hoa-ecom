<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        $data['title'] = 'Quản lý Tài khoản';
        return view('admin/pages/user/index', $data);
    }
}
