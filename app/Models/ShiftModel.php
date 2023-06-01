<?php

namespace App\Models;

use CodeIgniter\Model;

class ShiftModel extends Model
{
    protected $table = 'shift';
    protected $primaryKey = 'id_shift';

    public function getShift($id = false)
    {
        if ($id == false)
        {
            return $this->get();
        }

        return $this->where(['id_shift' => $id])->first();
    }
}