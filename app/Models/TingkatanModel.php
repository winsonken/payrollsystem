<?php

namespace App\Models;

use CodeIgniter\Model;

class TingkatanModel extends Model
{
    protected $table = 'tingkatan';
    protected $primaryKey = 'id_tingkat';
    protected $allowedFields = ['tingkatan_departemen', 'gaji_pokok', 'tingkatan_jabatan', 'hitung_ot'];

    public function getTingkatan($id = false)
    {
        if ($id == false)
        {
            return $this->join('departemen', 'departemen.id_departemen = tingkatan.tingkatan_departemen')->get();
        }

        return $this->where(['id_tingkat' => $id])->join('departemen', 'departemen.id_departemen = tingkatan.tingkatan_departemen')->first();
    }

    public function getTingkatanDepartemen($id)
    {
        return $this->where(['tingkatan_departemen' => $id])->join('departemen', 'departemen.id_departemen = tingkatan.tingkatan_departemen')->get();
    }

    public function getTingkatanDepartemenID()
    {
        return $this->select('tingkatan_departemen')->findAll();
    }

    public function getJumlahTingkatan()
    {
        $jumlahTingkatan = $this->db->table('tingkatan')->countAll();
        return $jumlahTingkatan;
    }
}