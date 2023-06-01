<?php

namespace App\Models;

use CodeIgniter\Model;

class PayslipModel extends Model
{
    protected $table = 'daftar_gaji_pph21';
    protected $primaryKey = 'id_gaji';
    protected $allowedFields = ['payroll', 'karyawan', 'jumlah_cuti', 'jumlah_kehadiran', 'pph21', 'gaji_perbulan', 'tunjangan', 'gaji_pertahun', 'bruto_karyawan', 'gaji_bersih_karyawan'];
    
    public function getPayslip($id = false)
    {
        if ($id == false)
        {
            return $this->join('karyawan', 'karyawan.id_karyawan = daftar_gaji_pph21.karyawan')
            ->join('payroll', 'payroll.id_payroll = daftar_gaji_pph21.payroll')
            ->get();
        }

        return $this->where(['id_gaji' => $id])->join('karyawan', 'karyawan.id_karyawan = daftar_gaji_pph21.karyawan')
        ->join('departemen', 'departemen.id_departemen = karyawan.departemen_karyawan')
        ->join('tingkatan', 'tingkatan.id_tingkat = karyawan.tingkatan')
        ->join('payroll', 'payroll.id_payroll = daftar_gaji_pph21.payroll')
        ->first();
    }

    public function getPayrollKaryawan()
    {
        return $this->select('payroll')->findAll();
    }

    public function getPayslipKaryawan($id)
    {
        return $this->where(['karyawan' => $id])->join('karyawan', 'karyawan.id_karyawan = daftar_gaji_pph21.karyawan')
        ->join('departemen', 'departemen.id_departemen = karyawan.departemen_karyawan')
        ->join('tingkatan', 'tingkatan.id_tingkat = karyawan.tingkatan')
        ->join('payroll', 'payroll.id_payroll = daftar_gaji_pph21.payroll')
        ->get();
    }

    public function getJumlahPayslip()
    {
        $jumlahPayslip = $this->db->table('daftar_gaji_pph21')->countAll();
        return $jumlahPayslip;
    }

}