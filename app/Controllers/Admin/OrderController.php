<?php

namespace App\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderDetail;

use App\Controllers\BaseController;

class OrderController extends BaseController
{
    public function __construct()
    {
        $this->orderModel = new Order();
        $this->orderDetailModel = new OrderDetail();
    }

    public function index()
    {
        $orders = $this->orderModel->findAll();
        foreach ($orders as $order) {
            $order->product_count = count($this->orderDetailModel->where('order_id', $order->id)->findAll());
            $order_details = $this->orderDetailModel->where('order_id', $order->id)->findAll();
            $sum_total = 0;
            foreach ($order_details as $order_detail) {
                $sum_total += $order_detail->unit_price * $order_detail->quantity;
            } 
            $order->sum_total = $sum_total;
        }
        $data['orders'] = $orders;
        $data['title'] = 'Quản lý Đơn hàng';
        return view('admin/pages/order/index', $data);
    }
}
