<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prodi';
    protected $primaryKey       = 'kdprodi';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $allowedFields    = ['kdprodi','nama_prodi','fakultas','password'];
}
