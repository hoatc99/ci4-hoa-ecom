<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Product;

use App\Controllers\BaseController;

class CategoryController extends BaseController
{
    public function __construct()
    {
        $this->categoryModel = new Category();
        $this->productModel = new Product();
    }

    public function index()
    {
        $categories = $this->categoryModel->findAll();
        foreach ($categories as $category) {
            $category->product_count = count($this->productModel->where('category_id', $category->id)->findAll());
        }
        $data['categories'] = $categories;
        $data['title'] = 'Quản lý Danh mục';
        return view('admin/pages/category/index', $data);
    }

    public function create()
    {
        $this->categoryModel->save([
            'name' => $this->request->getPost('ten_danh_muc'),
            'slug' => url_title($this->request->getPost('ten_danh_muc'), '-', true),
        ]);
        return redirect('Admin\CategoryController::index');
    }

    public function update($id)
    {
        $this->categoryModel->save([
            'id' => $id,
            'name' => $this->request->getPost('ten_danh_muc'),
            'slug' => url_title($this->request->getPost('ten_danh_muc'), '-', true),
        ]);
        return redirect('Admin\CategoryController::index');
    }
}
