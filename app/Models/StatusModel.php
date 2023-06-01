<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';

    public function getStatus($id = false)
    {
        if ($id == false)
        {
            return $this->get();
        }

        return $this->where(['id_status' => $id])->first();
    }
}