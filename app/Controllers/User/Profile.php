<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;

class Profile extends BaseController
{
    protected $KaryawanModel;
    public function __construct()
    {
        $this->KaryawanModel = new KaryawanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'content' => 'profile/profile',
            'karyawan' => $this->KaryawanModel->getKaryawan(session()->get('karyawan'))
        ];

        return view('layout/wrapper', $data);
    }
    
}
