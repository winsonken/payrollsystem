<?php

namespace App\Models;

use CodeIgniter\Model;

class KehadiranModel extends Model
{
    protected $table = 'kehadiran';
    protected $primaryKey = 'id_kehadiran';
    protected $allowedFields = ['karyawan', 'tanggal_kehadiran', 'time_in', 'time_out', 'OT'];

    public function getKehadiran($id = false)
    {
        if ($id == false)
        {
            return $this->get();
        }

        return $this->where(['id_kehadiran' => $id])->join('karyawan', 'karyawan.id_karyawan = kehadiran.karyawan')
        ->join('shift', 'karyawan.shift = shift.id_shift')->first();
    }

    public function getKehadiranKaryawan($id)
    {
        return $this->where(['karyawan' => $id])->join('karyawan', 'karyawan.id_karyawan = kehadiran.karyawan')->get();
    }
}