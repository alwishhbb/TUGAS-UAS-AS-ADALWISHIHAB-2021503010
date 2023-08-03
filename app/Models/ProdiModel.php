<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mhs';
    protected $primaryKey       = 'kdmhs';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['kdmhs','nama_mhs','fakultas','password'];

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];


    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])){
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'],PASSWORD_DEFAULT);

        return $data;
    }
}