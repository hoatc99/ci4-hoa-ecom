<?php

namespace App\Models;

use CodeIgniter\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';

    protected $primaryKey = 'id';

    protected $allowedFields = ['code', 'quantity', 'discount', 'started_date', 'expired_date', 'is_active'];

    protected $returnType = \App\Entities\Voucher::class;

    protected $useTimestamps = true;
}