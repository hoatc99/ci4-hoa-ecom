<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $primaryKey = 'id';

    protected $allowedFields = ['order_id', 'product_id', 'quantity', 'unit_price', 'discount'];

    protected $returnType = \App\Entities\OrderDetail::class;

    protected $useTimestamps = false;

    public function order()
    {
        return $this->belongsTo('order', 'App\Models\Order');
    }
}