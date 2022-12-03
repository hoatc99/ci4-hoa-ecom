<?php

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $allowedFields = ['fullname', 'email', 'delivery_date', 'payment_method', 'shipping_address', 'shipping_phone', 'voucher_id', 'order_status_id', 'note'];

    protected $returnType = \App\Entities\Order::class;

    protected $useTimestamps = true;

    public function order_details()
    {
        return $this->hasMany('order_details', 'App\Models\OrderDetail');
    }
}