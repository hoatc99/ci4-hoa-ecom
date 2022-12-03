<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductVersion extends Model
{
    protected $table = 'product_versions';

    protected $primaryKey = 'id';

    protected $allowedFields = ['product_id', 'attribute', 'value', 'unit_price', 'discount'];

    protected $returnType = \App\Entities\ProductVersion::class;

    protected $useTimestamps = false;
}