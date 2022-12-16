<?php

namespace App\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;

use App\Controllers\BaseController;

class BrandController extends BaseController
{
    public function __construct()
    {
        $this->brandModel = new Brand();
        $this->productModel = new Product();
    }

    public function index()
    {
        $brands = $this->brandModel->findAll();
        foreach ($brands as $brand) {
            $brand->product_count = count($this->productModel->where('brand_id', $brand->id)->findAll());
        }
        $data['brands'] = $brands;
        $data['title'] = 'Quản lý Thương hiệu';
        return view('admin/pages/brand/index', $data);
    }

    public function create()
    {
        $rules = [
            'ten_thuong_hieu' => 'required|min_length[1]|max_length[50]|is_unique[brands.name]',
        ];
        $errors = [
            'ten_thuong_hieu' => [
                'required' => 'Tên thương hiệu không được để trống',
                'min_length[1]' => 'Tên thương hiệu phải có ít nhất 1 ký tự',
                'max_length[50]' => 'Tên thương hiệu không được dài hơn 50 ký tự',
                'is_unique[brands.name]' => 'Tên thương hiệu này đã tồn tại',
            ],
        ];
        if ($this->validate($rules, $errors)) {
            $this->brandModel->save([
                'name' => $this->request->getPost('ten_thuong_hieu'),
                'slug' => url_title($this->request->getPost('ten_thuong_hieu'), '-', true),
            ]);
            return redirect('Admin\BrandController::index');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function update($id)
    {
        $this->brandModel->save([
            'id' => $id,
            'name' => $this->request->getPost('ten_thuong_hieu'),
            'slug' => url_title($this->request->getPost('ten_thuong_hieu'), '-', true),
        ]);
        return redirect('Admin\BrandController::index');
    }
}
