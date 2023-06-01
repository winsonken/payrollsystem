<?php 

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\PayslipModel;

class PayslipKaryawan extends BaseController
{
    protected $PayslipModel;

    public function __construct()
    {
        $this->PayslipModel = new PayslipModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Payslip Karyawan',
            'content' => 'payslipkaryawan/payslipkaryawan',
            'payslipKaryawan' => $this->PayslipModel->getPayslipKaryawan(session()->get('karyawan'))->getResult()
        ];

        return view('layout/wrapper', $data);
    }

    public function view_payslipkaryawan($id)
    {
        $data = [
            'title' => 'View Payslip Karyawan',
            'content' => 'payslipkaryawan/view_payslipkaryawan',
            'detailpayslip' => $this->PayslipModel->getPayslip($id)
        ];

        return view('layout/wrapper', $data);
    }
}





?>