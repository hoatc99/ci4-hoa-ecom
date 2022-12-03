<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'description'];

    protected $returnType = \App\Entities\Category::class;

    protected $useTimestamps = false;

    public function products()
    {
        return $this->hasMany('products', 'App\Models\Product');
    }
}