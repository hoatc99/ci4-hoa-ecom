<?php

namespace App\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderDetail;

class ClientController extends BaseController
{
    public function __construct()
    {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->brandModel = new Brand();
        $this->orderModel = new Order();
        $this->orderDetailModel = new OrderDetail();

        $cart = array_values(session()->get('cart') ?? array());
        $tmp_cart = array();
        foreach ($cart as $item) {
            $product = $this->productModel->find($item['id']);
            $product->quantity = $item['quantity'];
            $product->total = $product->quantity * $product->unit_price;
            array_push($tmp_cart, $product);
        }
        session()->set('tmp_cart', $tmp_cart);

        $wishlist = array_values(session()->get('wishlist') ?? array());
        $tmp_wishlist = array();
        foreach ($wishlist as $item) {
            $product = $this->productModel->find($item['id']);
            array_push($tmp_wishlist, $product);
        }
        session()->set('tmp_wishlist', $tmp_wishlist);
    }

    public function index()
    {
        $categories = $this->categoryModel->findAll();
        foreach ($categories as $category) {
            $category->count = count($this->productModel->where(['category_id' => $category->id, 'is_active' => 1])->findAll());
        }
        $data['categories'] = $categories;

        $products = $this->productModel->where('is_active', 1)->findAll();
        foreach ($products as $product) {
            $product->category = $this->categoryModel->find($product->category_id);
            $product->brand = $this->brandModel->find($product->brand_id);
        }

        session()->setFlashdata('products', $products);
        $data['products'] = $products;
        $data['title'] = 'Trang chủ';
        return view('clients/pages/home', $data);
    }

    public function product()
    {
        $categories = $this->categoryModel->findAll();
        foreach ($categories as $category) {
            $category->count = count($this->productModel->where(['category_id' => $category->id, 'is_active' => 1])->findAll());
        }
        $data['categories'] = $categories;

        $products = $this->productModel->where('is_active', 1)->findAll();
        foreach ($products as $product) {
            $product->category = $this->categoryModel->find($product->category_id);
            $product->brand = $this->brandModel->find($product->brand_id);
        }

        session()->setFlashdata('products', $products);
        $data['products'] = $products;
        $data['title'] = 'Sản phẩm';
        return view('clients/pages/product', $data);
    }

    public function single($slug)
    {
        $product = $this->productModel->where('slug', $slug)->first();
        $data['product'] = $product;
        $data['title'] = $product->name;
        return view('clients/pages/single', $data);
    }

    public function cart()
    {
        $data['cart'] = array_values(session()->get('tmp_cart'));
        $data['title'] = 'Giỏ hàng';
        return view('clients/pages/cart', $data);
    }

    public function blog()
    {
        $data['title'] = 'Bài viết';
        return view('clients/pages/blog', $data);
    }

    public function about()
    {
        $data['title'] = 'Giới thiệu';
        return view('clients/pages/about', $data);
    }

    public function contact()
    {
        $data['title'] = 'Liên hệ';
        return view('clients/pages/contact', $data);
    }

    public function add_to_cart($id)
    {
        $quantity = $this->request->getPost('quantity') ?? 1;
        $item = array('id' => $id, 'quantity' => $quantity);
        if (session()->has('cart')) {
            $index = $this->exists_in_cart($id);
            $cart = array_values(session()->get('cart'));
            if ($index == -1) {
                array_push($cart, $item);
            } else {
                $cart[$index]['quantity'] += $quantity;
            }
            session()->set('cart', $cart);
        } else {
            $cart = array($item);
            session()->set('cart', $cart);
        }
        return redirect()->back();
    }

    public function update_cart()
    {
        $cart = array_values(session()->get('cart'));
        for ($i = 0; $i < count($cart); $i++) {
            $quantity = $this->request->getPost('quantity')[$i];
            if ($quantity == 0) {
                unset($cart[$i]);
            } else {
                $cart[$i]['quantity'] = $quantity;
            }
        }
        session()->set('cart', $cart);
        return redirect()->back();
    }

    public function remove_from_cart($id)
    {
        $index = $this->exists_in_cart($id);
        $cart = array_values(session()->get('cart'));
        unset($cart[$index]);
        session()->set('cart', $cart);
        return redirect()->back();
    }

    private function exists_in_cart($id)
    {
        $cart = array_values(session()->get('cart'));
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function checkout()
    {
        $cart = array_values(session()->get('tmp_cart'));
        if (count($cart) == 0) {
            return redirect('ClientController::index');
        }
        $data['cart'] = $cart;
        $data['title'] = 'Thanh toán';
        return view('clients/pages/checkout', $data);
    }

    public function place_order()
    {
        $this->orderModel->save([
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
            'delivery_date' => $this->request->getPost('delivery_date'),
            'payment_method' => $this->request->getPost('payment_method'),
            'shipping_address' => $this->request->getPost('shipping_address'),
            'shipping_phone' => $this->request->getPost('shipping_phone'),
            // 'voucher_id' => $this->request->getPost('voucher_id'),
            'order_status_id' => 1,
            'note' => $this->request->getPost('note'),
        ]);

        $orderId = $this->orderModel->getInsertID();
        $cart = array_values(session()->get('tmp_cart'));
        foreach ($cart as $item) {
            $this->orderDetailModel->save([
                'order_id' => $orderId,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
                'discount' => 0,
            ]);
        }

        session()->remove('cart');
        return view('clients/pages/placed');
    }

    public function add_to_wishlist($id)
    {
        $item = array('id' => $id);
        array_push($wishlist, $item);
        if (session()->has('wishlist')) {
            $wishlist = array_values(session()->get('wishlist'));
        } else {
            $wishlist = array($item);
        }
        session()->set('wishlist', $wishlist);

        return redirect()->back();
    }

    public function remove_from_wishlist($id)
    {
        $index = $this->exists_in_wishlist($id);
        $wishlist = array_values(session()->get('wishlist'));
        unset($wishlist[$index]);
        session()->set('wishlist', $wishlist);
        return redirect()->back();
    }
    
    private function exists_in_wishlist($id)
    {
        $cart = array_values(session()->get('cart'));
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
    }
}
