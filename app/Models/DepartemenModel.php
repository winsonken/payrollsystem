<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartemenModel extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'id_departemen';
    protected $allowedFields = ['kode_departemen', 'nama_departemen'];

    public function getDepartemen($id = false)
    {
        if ($id == false)
        {
            return $this->get();
        }

        return $this->where(['id_departemen' => $id])->first();
    }

    public function getJumlahDepartemen()
    {
        $jumlahDepartemen = $this->db->table('departemen')->countAll();
        return $jumlahDepartemen;
    }
}