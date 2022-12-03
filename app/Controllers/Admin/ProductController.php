<?php

namespace App\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

use App\Controllers\BaseController;

class ProductController extends BaseController
{
    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->brandModel = new Brand();
    }

    public function index()
    {
        $products = $this->productModel->findAll();
        foreach ($products as $product) {
            $product->category = $this->categoryModel->find($product->category_id);
            $product->brand = $this->brandModel->find($product->brand_id);
        }
        $data['products'] = $products;
        $data['title'] = 'Quản lý Sản phẩm';
        return view('admin/pages/product/index', $data);
    }

    public function new()
    {
        $data['categories'] = $this->categoryModel->findAll();
        $data['brands'] = $this->brandModel->findAll();
        $data['title'] = 'Thêm Sản phẩm';
        return view('admin/pages/product/create_edit', $data);
    }

    public function create()
    {
        $this->productModel->save([
            'name' => $this->request->getPost('ten_san_pham'),
            'slug' => mb_url_title($this->request->getPost('ten_san_pham'), '-', true),
            'quantity' => $this->request->getPost('so_luong'),
            'unit_price' => (float)filter_var($this->request->getPost('don_gia'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'image' => $this->upload_image($this->request->getFile('anh_dai_dien')),
            'category_id' => $this->request->getPost('ma_danh_muc'),
            'brand_id' => $this->request->getPost('ma_thuong_hieu'),
        ]);
        return redirect('Admin\ProductController::index');
    }

    public function edit($id)
    {
        $data['categories'] = $this->categoryModel->findAll();
        $data['brands'] = $this->brandModel->findAll();
        $data['product'] = $this->productModel->find($id);
        $data['title'] = 'Sửa Sản phẩm';
        return view('admin/pages/product/create_edit', $data);
    }

    public function update($id)
    {
        $this->productModel->save([
            'id' => $id,
            'name' => $this->request->getPost('ten_san_pham'),
            'slug' => mb_url_title($this->request->getPost('ten_san_pham'), '-', true),
            'quantity' => $this->request->getPost('so_luong'),
            'unit_price' => (float)filter_var($this->request->getPost('don_gia'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
            'image' => $this->upload_image($this->request->getFile('anh_dai_dien')) ?: $this->request->getPost('anh_dai_dien_cu'),
            'category_id' => $this->request->getPost('ma_danh_muc'),
            'brand_id' => $this->request->getPost('ma_thuong_hieu'),
        ]);
        return redirect('Admin\ProductController::index');
    }

    public function disable($id)
    {
        $this->productModel->save([
            'id' => $id, 
            'is_active' => false,
        ]);
        return redirect('Admin\ProductController::index');
    }

    public function enable($id)
    {
        $this->productModel->save([
            'id' => $id, 
            'is_active' => true,
        ]);
        return redirect('Admin\ProductController::index');
    }

    public function upload_image($image)
    {
        if (!$image->isValid()) return false;
        $destination_path = 'uploads/images/';
        $image_name = $image->getRandomName();
        $image->move(ROOTPATH . 'public/assets/' . $destination_path, $image_name);
        return $destination_path . $image_name;
    }
}
