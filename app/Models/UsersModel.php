<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = ['karyawan', 'username', 'password', 'level'];
    public function getUser($id = false)
    {
        if ($id == false)
        {
            return $this->get();
        }

        return $this->where(['id_user' => $id])->first();
    }

    public function getDataUser($username, $password)
    {
        return $this->db->table('users')
        ->where(['username' => $username, 'password' => $password])
        ->get()->getRowArray();
    }
}