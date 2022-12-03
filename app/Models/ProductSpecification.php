<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductSpecification extends Model
{
    protected $table = 'product_specifications';

    protected $primaryKey = 'id';

    protected $allowedFields = ['product_id', 'attribute', 'value'];

    protected $returnType = \App\Entities\ProductSpecification::class;

    protected $useTimestamps = false;
}