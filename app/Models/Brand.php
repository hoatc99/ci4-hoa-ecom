<?php

namespace App\Models;

use CodeIgniter\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $primaryKey = 'id';

    protected $allowedFields = ['name'];

    protected $returnType = \App\Entities\Brand::class;

    protected $useTimestamps = false;
}