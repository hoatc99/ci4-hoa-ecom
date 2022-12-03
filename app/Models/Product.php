<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'slug' ,'quantity', 'unit_price', 'image', 'description', 'is_active', 'category_id', 'brand_id'];

    protected $returnType = \App\Entities\Product::class;

    protected $useTimestamps = true;

    public function category()
    {
        return $this->belongsTo('category', 'App\Models\Category');
    }
}
