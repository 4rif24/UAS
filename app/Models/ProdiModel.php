<?php
namespace App\Models;
use CodeIgniter\Model;
class ProdiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prodi';
    protected $primaryKey       = 'id_prodi';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_prodi','nama_prodi','fakultas','password'];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        
        return $data;
    }
}
    
