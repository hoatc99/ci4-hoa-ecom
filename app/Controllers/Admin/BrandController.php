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
        if ($this->validate($rules)) {
            $this->brandModel->save([
                'name' => $this->request->getPost('ten_thuong_hieu'),
            ]);
            return redirect('Admin\BrandController::index');
        } else {
            return redirect()->back()->with('validation', $this->validator);
        }
    }

    public function update($id)
    {
        $this->brandModel->save([
            'id' => $id,
            'name' => $this->request->getPost('ten_thuong_hieu'),
        ]);
        return redirect('Admin\BrandController::index');
    }
}
