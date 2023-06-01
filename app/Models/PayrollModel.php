<?php

namespace App\Models;

use CodeIgniter\Model;

class PayrollModel extends Model
{
    protected $table = 'payroll';
    protected $primaryKey = 'id_payroll';
    protected $allowedFields = ['kode_payroll', 'judul_payroll','tanggal_mulai', 'tanggal_berakhir'];

    public function getPayroll($id = false)
    {
        if ($id == false)
        {
            return $this->get();
        }

        return $this->where(['id_payroll' => $id])->first();
    }
    
}