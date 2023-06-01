<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DepartemenModel;
use App\Models\TingkatanModel;
use App\Models\KaryawanModel;
use App\Models\StatusModel;
use App\Models\LevelModel;
use App\Models\UsersModel;
use App\Models\ShiftModel;
use App\Models\PayslipModel;

class Karyawan extends BaseController
{
    protected $DepartemenModel;
    protected $TingkatanModel;
    protected $KaryawanModel;
    protected $StatusModel;
    protected $LevelModel;
    protected $UsersModel;
    protected $ShiftModel;


    protected $PayslipModel;
    public function __construct()
    {
        $this->DepartemenModel = new DepartemenModel();
        $this->TingkatanModel = new TingkatanModel();
        $this->KaryawanModel = new KaryawanModel();
        $this->StatusModel = new StatusModel();
        $this->LevelModel = new LevelModel();
        $this->UsersModel = new UsersModel();
        $this->ShiftModel = new ShiftModel();
        $this->PayslipModel = new PayslipModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Karyawan',
            'content' => 'karyawan/karyawan',
            'karyawan' => $this->KaryawanModel->getKaryawan()->getResult()
        ];
        
        return view('layout/wrapper', $data);
    }

    public function view_karyawan($id)
    {
        $data = [
            'title' => 'Data karyawan',
            'content' => 'karyawan/view_karyawan',
            'karyawan' => $this->KaryawanModel->getKaryawan($id)
        ];
        
        return view('layout/wrapper', $data);
    }
    
    public function add_karyawan()
    {
        $data = [
            'title' => 'Add Karyawan',
            'content' => 'karyawan/add_karyawan',
            'departemen' => $this->DepartemenModel->getDepartemen()->getResult(),
            'tingkatan' => $this->TingkatanModel->getTingkatan()->getResult(),
            'shift' => $this->ShiftModel->getShift()->getResult(),
            'status' => $this->StatusModel->getStatus()->getResult(),
            'level' => $this->LevelModel->getLevel()->getResult()
        ];
       
        return view('layout/wrapper', $data);
    }

    public function save_karyawan()
    {
        if (!$this->validate([
            'shift-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Shift karyawan harus dipilih'
                    ]
            ],
            'departemen-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama departemen harus dipilih'
                    ]
            ],
            'tingkatan-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tingkatan karyawan harus dipilih'
                    ]
            ],
            'nama-pertama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pertama harus diisi'
                    ]
            ],
            'nama-tengah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tengah harus diisi'
                    ]
            ],
            'nama-belakang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama belakang harus diisi'
                    ]
            ],
            'nik-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK karyawan harus diisi'
                    ]
            ],
            'tanggal-lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir harus diisi'
                    ]
            ],
            'jenis-kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin harus diisi'
                    ]
            ],
            'email-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email departemen harus diisi'
                    ]
            ],
            'alamat-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat karyawan harus diisi'
                    ]
            ],
            'kontak-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. telepon harus diisi'
                    ]
            ],
            'status-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus dipilih'
                    ]
            ],
            'username-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username karyawan harus diisi'
                    ]
            ],
            'password-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password karyawan harus diisi'
                    ]
            ],
            'level-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level karyawan harus dipilih'
                    ]
            ]
             
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'karyawan/add_karyawan')->withInput();
        }

        $data = [
            'shift' => $this->request->getPost('shift-karyawan'),
            'departemen_karyawan' => $this->request->getPost('departemen-karyawan'),
            'tingkatan' => $this->request->getPost('tingkatan-karyawan'),
            'nama_pertama' => $this->request->getPost('nama-pertama'),
            'nama_tengah' => $this->request->getPost('nama-tengah'),
            'nama_belakang' => $this->request->getPost('nama-belakang'),
            'nik_karyawan' => $this->request->getPost('nik-karyawan'),
            'tanggal_lahir' => $this->request->getPost('tanggal-lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis-kelamin'),
            'email' => $this->request->getPost('email-karyawan'),
            'alamat' => $this->request->getPost('alamat-karyawan'),
            'kontak' => $this->request->getPost('kontak-karyawan'),
            'status' => $this->request->getPost('status-karyawan')
        ];
     
        $success = $this->KaryawanModel->save($data);
        if ($success) {
            session()->setFlashData('message', 'Karyawan berhasil ditambahkan!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Karyawan gagal ditambahkan!');
            session()->setFlashData('message_class', 'alert-danger');
        }
        
        $new_karyawan_id = $this->KaryawanModel->getInsertID();
        
        $data2 = [
            'karyawan' => $new_karyawan_id,
            'username' => $this->request->getPost('username-karyawan'),
            'password' => $this->request->getPost('password-karyawan'),
            'level' => $this->request->getPost('level-karyawan')
        ];
        
        $this->UsersModel->save($data2);

        return redirect()->to(base_url() . 'karyawan');
    }

    public function edit_karyawan($id)
    {
        $data = [
            'title' => 'Edit karyawan',
            'content' => 'karyawan/edit_karyawan',
            'karyawan' => $this->KaryawanModel->getKaryawan($id),
            'departemen' => $this->DepartemenModel->getDepartemen()->getResult(),
            'tingkatan' => $this->TingkatanModel->getTingkatan()->getResult(),
            'shift' => $this->ShiftModel->getShift()->getResult(),
            'status' => $this->StatusModel->getStatus()->getResult(),
            'level' => $this->LevelModel->getLevel()->getResult()

        ];

        return view('layout/wrapper', $data);
    }

    public function update_karyawan($id)
    {
        if (!$this->validate([
            'shift-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Shift karyawan harus dipilih'
                    ]
            ],
            'departemen-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama departemen harus dipilih'
                    ]
            ],
            'tingkatan-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tingkatan karyawan harus dipilih'
                    ]
            ],
            'nama-pertama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pertama harus diisi'
                    ]
            ],
            'nama-tengah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tengah harus diisi'
                    ]
            ],
            'nama-belakang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama belakang harus diisi'
                    ]
            ],
            'nik-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'NIK karyawan harus diisi'
                    ]
            ],
            'tanggal-lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir harus diisi'
                    ]
            ],
            'jenis-kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin harus diisi'
                    ]
            ],
            'email-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email departemen harus diisi'
                    ]
            ],
            'alamat-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat karyawan harus diisi'
                    ]
            ],
            'kontak-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. telepon harus diisi'
                    ]
            ],
            'status-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status harus dipilih'
                    ]
            ],
            'username-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username karyawan harus diisi'
                    ]
            ],
            'password-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password karyawan harus diisi'
                    ]
            ],
            'level-karyawan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level karyawan harus dipilih'
                    ]
            ]
             
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'karyawan/edit_karyawan/' . $id)->withInput();
        }

        $data = [
            'id_karyawan' => $id,
            'shift' => $this->request->getPost('shift-karyawan'),
            'departemen_karyawan' => $this->request->getPost('departemen-karyawan'),
            'tingkatan' => $this->request->getPost('tingkatan-karyawan'),
            'nama_pertama' => $this->request->getPost('nama-pertama'),
            'nama_tengah' => $this->request->getPost('nama-tengah'),
            'nama_belakang' => $this->request->getPost('nama-belakang'),
            'nik_karyawan' => $this->request->getPost('nik-karyawan'),
            'tanggal_lahir' => $this->request->getPost('tanggal-lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis-kelamin'),
            'email' => $this->request->getPost('email-karyawan'),
            'alamat' => $this->request->getPost('alamat-karyawan'),
            'kontak' => $this->request->getPost('kontak-karyawan'),
            'status' => $this->request->getPost('status-karyawan')
        ];
        
        // $karyawan = $this->request->getPost('karyawan');
        
        $data2 = [
            'id_user' => $this->request->getPost('id-user'),
            'karyawan' => $id,
            'username' => $this->request->getPost('username-karyawan'),
            'password' => $this->request->getPost('password-karyawan'),
            'level' => $this->request->getPost('level-karyawan')
        ];
       
        $success = $this->KaryawanModel->save($data);
        $success2 = $this->UsersModel->save($data2);

        if ($success && $success2) {
            session()->setFlashData('message', 'Karyawan berhasil diubah!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Karyawan gagal diubah!');
            session()->setFlashData('message_class', 'alert-danger');
        }

        return redirect()->to(base_url() . 'karyawan');
    }

    public function delete_karyawan()
    {
        $id = $this->request->getPost('delete-karyawan');
        
        $this->UsersModel->where('karyawan', $id)->delete();
        $this->PayslipModel->where('karyawan', $id)->delete();
        $success = $this->KaryawanModel->where('id_karyawan', $id)->delete();
       
        if ($success) {
            session()->setFlashData('message', 'Karyawan berhasil dihapus!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Karyawan gagal dihapus!');
            session()->setFlashData('message_class', 'alert-danger');
        }
        
        return redirect()->to(base_url() . 'karyawan');
    }

}
