<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DepartemenModel;
use App\Models\TingkatanModel;
use App\Models\KaryawanModel;
class Tingkatan extends BaseController
{
    protected $DepartemenModel;
    protected $TingkatanModel;
    protected $KaryawanModel;
    public function __construct()
    {
        $this->DepartemenModel = new DepartemenModel();
        $this->TingkatanModel = new TingkatanModel();
        $this->KaryawanModel = new KaryawanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Tingkatan',
            'content' => 'tingkatan/tingkatan',
            'departemen' => $this->DepartemenModel->getDepartemen()->getResult(),
            'tingkatan' => $this->TingkatanModel->getTingkatan()->getResult()
        ];
        
        return view('layout/wrapper', $data);
    }

    public function view_tingkatan($id)
    {
        $data = [
            'title' => 'Tingkatan',
            'content' => 'tingkatan/view_tingkatan',
            'tingkatan' => $this->TingkatanModel->getTingkatanDepartemen($id)->getResult()
        ];
        
        
        return view('tingkatan/view_tingkatan', $data);
    }

    public function add_tingkatan()
    {
        $data = [
            'title' => 'Add tingkatan',
            'content' => 'tingkatan/add_tingkatan',
            'departemen' => $this->DepartemenModel->getDepartemen()->getResult()
        ];

        return view('layout/wrapper', $data);
    }

    public function save_tingkatan()
    {
        if (!$this->validate([
            'tingkatan-departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Departemen harus dipilih'
                    ]
            ],
            'tingkatan-jabatan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tingkatan harus diisi',
                    'alpha_space' => 'Nama tingkatan tidak berupa simbol'
                    ]
            ],
            'hitung-ot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hitung OT harus dipilih'
                    ]
            ]
             
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'tingkatan/add_tingkatan')->withInput();
        }
        
        $data = [
            'tingkatan_departemen' => $this->request->getPost('tingkatan-departemen'),
            'tingkatan_jabatan' => $this->request->getPost('tingkatan-jabatan'),
            'hitung_ot' => $this->request->getPost('hitung-ot')
        ];

        $success = $this->TingkatanModel->save($data);

        if ($success) {
            session()->setFlashData('message', 'Tingkatan berhasil ditambah!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Tingkatan gagal ditambah!');
            session()->setFlashData('message_class', 'alert-danger');
        }

        return redirect()->to(base_url() . 'tingkatan');
    }

    public function edit_tingkatan($id)
    {
        $data = [
            'title' => 'Edit tingkatan',
            'content' => 'tingkatan/edit_tingkatan',
            'tingkatan' => $this->TingkatanModel->getTingkatan($id),
            'departemen' => $this->DepartemenModel->getDepartemen()->getResult()
        ];
        
        return view('layout/wrapper', $data);
    }

    public function update_tingkatan($id)
    {
        if (!$this->validate([
            'tingkatan-departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Departemen harus dipilih'
                    ]
            ],
            'tingkatan-jabatan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tingkatan harus diisi',
                    'alpha_space' => 'Nama tingkatan tidak berupa simbol'
                    ]
            ],
            'hitung-ot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Hitung OT harus dipilih'
                    ]
            ]
             
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'tingkatan/edit_tingkatan/' . $id)->withInput();
        }
        
        $data = [
            'id_tingkat' => $id,
            'tingkatan_departemen' => $this->request->getPost('tingkatan-departemen'),
            'tingkatan_jabatan' => $this->request->getPost('tingkatan-jabatan'),
            'hitung_ot' => $this->request->getPost('hitung-ot')
        ];

        $success = $this->TingkatanModel->save($data);

        if ($success) {
            session()->setFlashData('message', 'Tingkatan berhasil diubah!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Tingkatan gagal diubah!');
            session()->setFlashData('message_class', 'alert-danger');
        }

        return redirect()->to(base_url() . 'tingkatan');
    }

    public function delete_tingkatan()
    {
        $tingkatan_karyawan_id = $this->KaryawanModel->getTingkatanKaryawan();
        $id = $this->request->getPost('delete-tingkatan');

        if ($tingkatan_karyawan_id == NULL) {

            $success = $this->TingkatanModel->where('id_tingkat', $id)->delete();

            if ($success) {
                $this->TingkatanModel->where('id_tingkat', $id)->delete();
                session()->setFlashData('message', 'Tingkatan berhasil dihapus!');
                session()->setFlashData('message_class', 'alert-success');
            } else {
                session()->setFlashData('message', 'Tingkatan gagal dihapus!');
                session()->setFlashData('message_class', 'alert-danger');
            }

        } else if ($tingkatan_karyawan_id != NULL) {

            foreach($tingkatan_karyawan_id as $all_tingkatan_karyawan_id){
                $tingkatan_karyawan[] = $all_tingkatan_karyawan_id["tingkatan"];
            }
    
            if (!in_array($id, $tingkatan_karyawan)) {
                $this->TingkatanModel->where('id_tingkat', $id)->delete();
                session()->setFlashData('message', 'Tingkatan berhasil dihapus!');
                session()->setFlashData('message_class', 'alert-success');
            } else {
                session()->setFlashData('message', 'Tingkatan gagal dihapus, silahkan hapus semua karyawan yang terdapat ditingkatan tersebut!');
                session()->setFlashData('message_class', 'alert-danger');
            }

        }

        return redirect()->to(base_url() . 'tingkatan');
    }

}
