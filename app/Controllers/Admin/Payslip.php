<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\KaryawanModel;
use App\Models\PayrollModel;
use App\Models\PayslipModel;

class Payslip extends BaseController
{
    protected $KaryawanModel;
    protected $PayrollModel;
    protected $PayslipModel;

    public function __construct()
    {
        $this->KaryawanModel = new KaryawanModel();
        $this->PayrollModel = new PayrollModel();
        $this->PayslipModel = new PayslipModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Payslip',
            'content' => 'payslip/payslip',
            'payslip' => $this->PayslipModel->getPayslip()->getResult()
        ];

        return view('layout/wrapper', $data);
    }

    public function view_payslip($id)
    {
        $data = [
            'title' => 'View Payslip',
            'content' => 'payslip/view_payslip',
            'payslip' => $this->PayslipModel->getPayslip($id)
        ];

        return view('layout/wrapper', $data);
    }

    public function add_payslip()
    {
        $data = [
            'title' => 'Add Payslip',
            'content' => 'payslip/add_payslip',
            'karyawan' => $this->KaryawanModel->getKaryawan()->getResult(),
            'payroll' => $this->PayrollModel->getPayroll()->getResult(),
        ];

        return view('layout/wrapper', $data);
    }

    public function save_payslip()
    {
        if (!$this->validate([
            'payroll' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Payroll harus dipilih'
                    ]
            ],
            'nama-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Karyawan harus dipilih'
                    ]
            ],
            'jumlah-cuti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah cuti harus diisi'
                    ]
            ],
            'kehadiran-karyawan' => [
                'rules' => 'required|less_than_equal_to[30]',
                'errors' => [
                    'required' => 'Kehadiran harus diisi',
                    'less_than_equal_to' => 'Kehadiran/bulan harus diantara 0 - 30'
                    ]
            ],
            'pph21' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'PPH21 harus diisi'
                    ]
            ],
            'gaji-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gaji/bulan harus diisi'
                    ]
            ],
            'tunjangan-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tunjangan harus diisi'
                    ]
            ],
            'ot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'OT harus diisi'
                    ]
            ],
            
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'payslip/add_payslip')->withInput();
        }

        $gajiKaryawan = $this->request->getPost("gaji-karyawan");
        $gajiPerTahun = $gajiKaryawan * 12;
        $data = [
            'payroll' => $this->request->getPost("payroll"),
            'karyawan' => $this->request->getPost("nama-karyawan"),
            'jumlah_cuti' => $this->request->getPost("payroll"),
            'jumlah_kehadiran' => $this->request->getPost("kehadiran-karyawan"),
            'pph21' => $this->request->getPost("pph21"),
            'gaji_perbulan' => $gajiKaryawan,
            'tunjangan' => $this->request->getPost("tunjangan-karyawan"),
            'gaji_pertahun' => $gajiPerTahun,
            'bruto_karyawan' => $this->request->getPost("gaji-kotor"),
            'gaji_bersih_karyawan' => $this->request->getPost("gaji-bersih")
        ];
        
        $success = $this->PayslipModel->save($data);
        
        if ($success) {
            session()->setFlashData('message', 'Payslip berhasil ditambahkan!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Payslip gagal ditambahkan!');
            session()->setFlashData('message_class', 'alert-danger');
        }
        
        return redirect()->to(base_url() . 'payslip');

    }

    public function edit_payslip($id)
    {
        $data = [
            'title' => 'Edit payslip',
            'content' => 'payslip/edit_payslip',
            'payslip' => $this->PayslipModel->getPayslip($id),
            'karyawan' => $this->KaryawanModel->getKaryawan()->getResult(),
            'payroll' => $this->PayrollModel->getPayroll()->getResult()
        ];

        return view('layout/wrapper', $data);
    }

    public function update_payslip($id)
    {
        if (!$this->validate([
            'payroll' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Payroll harus dipilih'
                    ]
            ],
            'nama-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Karyawan harus dipilih'
                    ]
            ],
            'jumlah-cuti' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jumlah cuti harus diisi'
                    ]
            ],
            'kehadiran-karyawan' => [
                'rules' => 'required|less_than_equal_to[30]',
                'errors' => [
                    'required' => 'Kehadiran harus diisi',
                    'less_than_equal_to' => 'Kehadiran/bulan harus diantara 0 - 30'
                    ]
            ],
            'pph21' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'PPH21 harus diisi'
                    ]
            ],
            'gaji-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gaji/bulan harus diisi'
                    ]
            ],
            'tunjangan-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tunjangan harus diisi'
                    ]
            ],
            'ot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'OT harus diisi'
                    ]
            ],
            
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'payslip/edit_payslip/' . $id)->withInput();
        }

        $gajiKaryawan = $this->request->getPost("gaji-karyawan");
        $gajiPerTahun = $gajiKaryawan * 12;
        $data = [
            'id_gaji' => $id,
            'payroll' => $this->request->getPost("payroll"),
            'karyawan' => $this->request->getPost("nama-karyawan"),
            'jumlah_cuti' => $this->request->getPost("payroll"),
            'jumlah_kehadiran' => $this->request->getPost("kehadiran-karyawan"),
            'pph21' => $this->request->getPost("pph21"),
            'gaji_perbulan' => $gajiKaryawan,
            'tunjangan' => $this->request->getPost("tunjangan-karyawan"),
            'gaji_pertahun' => $gajiPerTahun,
            'bruto_karyawan' => $this->request->getPost("gaji-kotor"),
            'gaji_bersih_karyawan' => $this->request->getPost("gaji-bersih")
        ];

        $success = $this->PayslipModel->save($data);
        
        if ($success) {
            session()->setFlashData('message', 'Payslip berhasil diubah!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Payslip gagal diubah!');
            session()->setFlashData('message_class', 'alert-danger');
        }
        
        return redirect()->to(base_url() . 'payslip');
    }

    public function delete_payslip()
    {
        $id = $this->request->getPost('delete-payslip');
        
        $success = $this->PayslipModel->where('id_gaji', $id)->delete();

        if ($success) {
            session()->setFlashData('message', 'Payslip berhasil dihapus!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Payslip gagal dihapus!');
            session()->setFlashData('message_class', 'alert-danger');
        }
        
        return redirect()->to(base_url() . 'payslip');
    }
    
}





?>