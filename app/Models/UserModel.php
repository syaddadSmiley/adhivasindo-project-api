<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['username',  'password', ];

    protected bool $allowEmptyInserts = false;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // public function insert($row = null, bool $returnID = true)
    // {
    //     $row['created_at'] = date('Y-m-d H:i:s');
    //     $row['updated_at'] = date('Y-m-d H:i:s');

    //     return parent::insert($row, $returnID);
    // }
}
