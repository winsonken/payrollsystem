<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PayrollModel;
use App\Models\PayslipModel;

class Payroll extends BaseController
{
    protected $PayrollModel;
    protected $PayslipModel;
    public function __construct()
    {
       $this->PayrollModel = new PayrollModel();
       $this->PayslipModel= new PayslipModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Payroll',
            'content' => 'payroll/payroll',
            'payroll' => $this->PayrollModel->getPayroll()->getResult()
        ];

        return view('layout/wrapper', $data);
    }

    public function add_payroll() 
    {
        $data = [
            'title' => 'Add payroll',
            'content' => 'payroll/add_payroll',
        ];

        return view('layout/wrapper', $data);
    }
    
    public function save_payroll() 
    {
        if (!$this->validate([
            'kode-payroll' => [
                'rules' => 'required|is_unique[payroll.kode_payroll]',
                'errors' => [
                    'required' => 'Kode payroll harus diisi',
                    'is_unique' => 'Kode payroll sudah ada'
                    ]
            ],
            'judul-payroll' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul payroll harus diisi'
                    ]
            ],
            'tanggal-mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal mulai harus diisi'
                    ]
            ],
            'tanggal-berakhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal berakhir harus diisi'
                    ]
            ]
             
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'payroll/add_payroll')->withInput();
        }

        $data = [
            'kode_payroll' => $this->request->getPost('kode-payroll'),
            'judul_payroll' => $this->request->getPost('judul-payroll'),
            'tanggal_mulai' => $this->request->getPost('tanggal-mulai'),
            'tanggal_berakhir' => $this->request->getPost('tanggal-berakhir')
        ];

        $success = $this->PayrollModel->save($data);

        if ($success) {
            session()->setFlashData('message', 'Payroll berhasil ditambahkan!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Payroll gagal ditambahkan!');
            session()->setFlashData('message_class', 'alert-danger');
        }
        
        return redirect()->to(base_url() . 'payroll');
    }

    public function edit_payroll($id) 
    {
        $data = [
            'title' => 'Edit payroll',
            'content' => 'payroll/edit_payroll',
            'payroll' => $this->PayrollModel->getPayroll($id)
        ];

        return view('layout/wrapper', $data);
    }


    public function update_payroll($id) 
    {
        if (!$this->validate([
            'kode-payroll' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode payroll harus diisi'
                    ]
            ],
            'judul-payroll' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul payroll harus diisi'
                    ]
            ],
            'tanggal-mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal mulai harus diisi'
                    ]
            ],
            'tanggal-berakhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal berakhir harus diisi'
                    ]
            ]
             
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'payroll/edit_payroll/' . $id)->withInput();
        }

        $data = [
            'id_payroll' => $id,
            'kode_payroll' => $this->request->getPost('kode-payroll'),
            'judul_payroll' => $this->request->getPost('judul-payroll'),
            'tanggal_mulai' => $this->request->getPost('tanggal-mulai'),
            'tanggal_berakhir' => $this->request->getPost('tanggal-berakhir')
        ];

        $success = $this->PayrollModel->save($data);

        if ($success) {
            session()->setFlashData('message', 'Payroll berhasil diubah!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Payroll gagal diubah!');
            session()->setFlashData('message_class', 'alert-danger');
        }
        
        return redirect()->to(base_url() . 'payroll');
    }

    // public function temp_delete_payroll() {
    //     $id = $this->request->getPost('delete-payroll');
        
    //     $success = $this->PayrollModel->where('id_payroll', $id)->delete();

    //     if ($success) {
    //         session()->setFlashData('message', 'Payroll berhasil dihapus');
    //         session()->setFlashData('message_class', 'alert-success');
    //     } else {
    //         session()->setFlashData('message', 'Payroll gagal dihapus');
    //         session()->setFlashData('message_class', 'alert-danger');
    //     }
        
    //     return redirect()->to(base_url() . 'payroll');
    // }

    public function delete_payroll()
    {
        $payroll_karyawan_id = $this->PayslipModel->getPayrollKaryawan();
        $id = $this->request->getPost('delete-payroll');

        
        if ($payroll_karyawan_id == NULL) {

            $success = $this->PayrollModel->where('id_payroll', $id)->delete();

            if ($success) {
                $this->PayrollModel->where('id_payroll', $id)->delete();
                session()->setFlashData('message', 'Payroll berhasil dihapus!');
                session()->setFlashData('message_class', 'alert-success');
            } else {
                session()->setFlashData('message', 'Payroll gagal dihapus!');
                session()->setFlashData('message_class', 'alert-danger');
            }

        } else if ($payroll_karyawan_id != NULL) {

            foreach($payroll_karyawan_id as $all_payroll_karyawan_id){
                $payroll_karyawan[] = $all_payroll_karyawan_id["payroll"];
            }

            if (!in_array($id, $payroll_karyawan)) {
                $this->PayrollModel->where('id_payroll', $id)->delete();
                session()->setFlashData('message', 'Payroll berhasil dihapus!');
                session()->setFlashData('message_class', 'alert-success');
            } else {
                session()->setFlashData('message', 'Payroll gagal dihapus, silahkan hapus payslip karyawan yang terdapat dipayroll tersebut!');
                session()->setFlashData('message_class', 'alert-danger');
            }
            
        }

        return redirect()->to(base_url() . 'payroll');
    }
}
