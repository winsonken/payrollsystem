<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\DepartemenModel;
use App\Models\TingkatanModel;
use App\Models\KaryawanModel;
use App\Models\PayslipModel;

class Home extends BaseController
{
    protected $DepartemenModel;
    protected $TingkatanModel;

    protected $KaryawanModel;

    protected $PayslipModel;


    public function __construct()
    {
        $this->DepartemenModel = new DepartemenModel();
        $this->TingkatanModel = new TingkatanModel();
        $this->KaryawanModel = new KaryawanModel();
        $this->PayslipModel = new PayslipModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'content' => 'dashboard/home',
            'departemen' => $this->DepartemenModel->getJumlahDepartemen(),
            'tingkatan' => $this->TingkatanModel->getJumlahTingkatan(),
            'karyawan' => $this->KaryawanModel->getJumlahKaryawan(),
            'payslip' => $this->PayslipModel->getJumlahPayslip()
        ];

        return view('layout/wrapper', $data);
    }
}
