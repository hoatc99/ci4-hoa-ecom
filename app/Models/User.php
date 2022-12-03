<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'password', 'fullname', 'role', 'is_active', 'email'];

    protected $returnType = \App\Entities\User::class;

    protected $useTimestamps = true;
}