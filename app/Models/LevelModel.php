<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
    protected $table = 'level';
    protected $primaryKey = 'id_level';

    public function getLevel($id = false)
    {
        if ($id == false)
        {
            return $this->get();
        }

        return $this->where(['id_level' => $id])->first();
    }
}