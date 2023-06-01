<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $allowedFields = ['shift', 'departemen_karyawan', 'tingkatan', 'nama_pertama', 'nama_tengah', 'nama_belakang', 'nik_karyawan', 'tanggal_lahir', 'jenis_kelamin', 'email', 'alamat', 'kontak', 'status'];

    public function getKaryawan($id = false)
    {
        if ($id == false)
        {
            return $this->join('departemen', 'departemen.id_departemen = karyawan.departemen_karyawan')
            ->join('tingkatan', 'tingkatan.id_tingkat = karyawan.tingkatan')
            ->join('shift', 'shift.id_shift = karyawan.shift')->get();
        }

        return $this->where(['id_karyawan' => $id])->join('departemen', 'departemen.id_departemen = karyawan.departemen_karyawan')
        ->join('tingkatan', 'tingkatan.id_tingkat = karyawan.tingkatan')
        ->join('shift', 'shift.id_shift = karyawan.shift')
        ->join('status', 'status.id_status = karyawan.status')
        ->join('users', 'users.karyawan = karyawan.id_karyawan')
        ->join('level', 'users.level = level.id_level')->first();
    }

    public function getTingkatanKaryawan()
    {
        return $this->select('tingkatan')->findAll();
    }

    public function getJumlahKaryawan()
    {
        $jumlahKaryawan = $this->db->table('karyawan')->countAll();
        return $jumlahKaryawan;
    }

}