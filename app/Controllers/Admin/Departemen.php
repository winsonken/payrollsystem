<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DepartemenModel;
use App\Models\TingkatanModel;
class Departemen extends BaseController
{
    protected $DepartemenModel;
    protected $TingkatanModel;
    public function __construct()
    {
        $this->DepartemenModel = new DepartemenModel();
        $this->TingkatanModel = new TingkatanModel();
    }

    public function index()
    {
        
        $data = [
            'title' => 'Departemen',
            'content' => 'departemen/departemen',
            'departemen' => $this->DepartemenModel->getDepartemen()->getResult(),
        ];
        
        return view('layout/wrapper', $data);
    }

    public function add_departemen()
    {
        $data = [
            'title' => 'Add Departemen',
            'content' => 'departemen/add_departemen',
        ];
        return view('layout/wrapper', $data);
    }

    public function save_departemen()
    {
        if (!$this->validate([
            'kode-departemen' => [
                'rules' => 'required|is_unique[departemen.kode_departemen]',
                'errors' => [
                    'required' => 'Kode departemen harus diisi',
                    'is_unique' => 'Kode departemen sudah ada'
                    ]
            ],
            'nama-departemen' => [
                'rules' => 'required|is_unique[departemen.nama_departemen]',
                'errors' => [
                    'required' => 'Nama departemen harus diisi',
                    'is_unique' => 'Nama departemen sudah ada'
                    ]
            ]
             
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'departemen/add_departemen')->withInput();
        }
        
        $data = [
            'kode_departemen' => $this->request->getPost('kode-departemen'),
            'nama_departemen' => $this->request->getPost('nama-departemen')
        ];

        $success = $this->DepartemenModel->save($data);

        if ($success) {
            session()->setFlashData('message', 'Departemen berhasil ditambah!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Departemen gagal ditambah!');
            session()->setFlashData('message_class', 'alert-danger');
        }

        return redirect()->to(base_url() . 'departemen');
    }

    public function edit_departemen($id)
    {
        $data = [
            'title' => 'Edit departemen',
            'content' => 'Views/departemen/edit_departemen',
            'departemen' => $this->DepartemenModel->getDepartemen($id)
        ];

        return view('layout/wrapper', $data);
    }

    public function update_departemen($id)
    {
        if (!$this->validate([
            'kode-departemen' => [
                'rules' => "required|is_unique[departemen.kode_departemen, id_departemen, ${id}]",
                'errors' => [
                    'required' => 'Kode departemen harus diisi',
                    'is_unique' => 'Kode departemen sudah ada'
                    ]
            ],
            'nama-departemen' => [
                'rules' => "required|is_unique[departemen.nama_departemen, id_departemen, ${id}]",
                'errors' => [
                    'required' => 'Nama departemen harus diisi',
                    'is_unique' => 'Nama departemen sudah ada'
                    ]
            ]
             
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . 'departemen/edit_departemen/' . $id)->withInput();
        }

        $data = [
            'id_departemen' => $id,
            'kode_departemen' => $this->request->getPost('kode-departemen'),
            'nama_departemen' => $this->request->getPost('nama-departemen')
        ];

        $success = $this->DepartemenModel->save($data);

        if ($success) {
            session()->setFlashData('message', 'Departemen berhasil diubah!');
            session()->setFlashData('message_class', 'alert-success');
        } else {
            session()->setFlashData('message', 'Departemen gagal diubah!');
            session()->setFlashData('message_class', 'alert-danger');
        }

        return redirect()->to(base_url() . 'departemen');
    }

    public function delete_departemen()
    {
        $tingkatan_departemen_id = $this->TingkatanModel->getTingkatanDepartemenID();
        $id = $this->request->getPost('delete-departemen');
        
        if ($tingkatan_departemen_id == NULL) {
            $success = $this->DepartemenModel->where('id_departemen', $id)->delete();

            if ($success) {
                $this->DepartemenModel->where('id_departemen', $id)->delete();
                session()->setFlashData('message', 'Departemen berhasil dihapus!');
                session()->setFlashData('message_class', 'alert-success');
            } else {
                session()->setFlashData('message', 'Departemen gagal dihapus');
                session()->setFlashData('message_class', 'alert-danger');
            }

        } else if ($tingkatan_departemen_id != NULL) {

            foreach($tingkatan_departemen_id as $all_tingkatan_departemen_id){
                $id_tingkatan_departemen[] = $all_tingkatan_departemen_id["tingkatan_departemen"];
            }
            
            if (!in_array($id, $id_tingkatan_departemen)) {
                $this->DepartemenModel->where('id_departemen', $id)->delete();
                session()->setFlashData('message', 'Departemen berhasil dihapus!');
                session()->setFlashData('message_class', 'alert-success');
            } else {
                session()->setFlashData('message', 'Departemen gagal dihapus, silahkan hapus semua tingkatan yang terdapat didepartemen tersebut!');
                session()->setFlashData('message_class', 'alert-danger');
            }

        }
        
        return redirect()->to(base_url() . 'departemen');
    }

}
